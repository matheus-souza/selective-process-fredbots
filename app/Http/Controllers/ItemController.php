<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a home.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        return view('item.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::with('user')->get();

        return view('item.list')->with(compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('item.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                if(substr($request->image->getMimeType(), 0, 5) != 'image')
                    return redirect()->back()->with('error', 'Upload images only.');

                $name = uniqid(date('HisYmd'));
                $extension = $request->image->extension();
                $nameFile = "{$name}.{$extension}";
                $upload = $request->image->storeAs('items', $nameFile);

                if (!$upload)
                    return redirect()->back()->with('error', 'Failed to upload.');
            }

            $item = new Item($request->all());
            $item->image = $nameFile ?? null;
            $item->save();

            return redirect()->route('item.create')->with(['success' => 'Saved item successfully.']);
        } catch (\Exception $e) {
            return redirect()->route('item.create')->with(['error' => 'Error saving item.']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        return view('item.show')->with(compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        return view('item.edit')->with(compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        try {
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                if(substr($request->image->getMimeType(), 0, 5) != 'image')
                    return redirect()->back()->with('error', 'Upload images only.');

                $name = uniqid(date('HisYmd'));
                $extension = $request->image->extension();
                $nameFile = "{$name}.{$extension}";
                $upload = $request->image->storeAs('items', $nameFile);

                if (!$upload)
                    return redirect()->back()->with('error', 'Failed to upload.');
            }

            $input = $request->all();
            $item->title = $input['title'] ?? $item->title;
            $item->description = $input['description'] ?? $item->description;
            $item->image = $input['image'] ?? $item->image;

            $item->save();

            return redirect()->route('item.index')->with(['success' => 'Updated item successfully.']);
        } catch (\Exception $e) {
            return redirect()->route('item.index')->with(['error' => 'Error updating item.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        try {
            $item->delete();

            return redirect()->route('item.index')->with(['success' => 'Deleted item successfully.']);
        } catch (\Exception $e) {
            return redirect()->route('item.index')->with(['error' => 'Error deleting item.']);
        }
    }
}
