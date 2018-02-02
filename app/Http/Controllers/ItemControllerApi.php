<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;
use App\Http\Requests;
use EllipseSynergie\ApiResponse\Contracts\Response;
use App\Transformer\ItemTransformer;

class ItemControllerApi extends Controller
{
    protected $respose;

    public function __construct(Response $response)
    {
        $this->response = $response;
    }

    public function index()
    {
        $item = Item::with('user')->get();
        return $this->response->withCollection($item, new  ItemTransformer());
    }

    public function show($id)
    {
        $item = Item::find($id);
        if (!$item) {
            return $this->response->errorNotFound('Item Not Found');
        }
        // Return a single task
        return $this->response->withItem($item, new  ItemTransformer());
    }

    public function destroy($id)
    {
        $item = Item::find($id);
        if (!$item) {
            return $this->response->errorNotFound('Item Not Found');
        }

        if($item->delete()) {
            return $this->response->withItem($item, new  ItemTransformer());
        } else {
            return $this->response->errorInternalError('Could not delete a task');
        }

    }

    public function store(Request $request)  {
        if ($request->isMethod('put')) {
            $item = Item::find($request->input('item_id'));
            if (!$item) {
                return $this->response->errorNotFound('Item Not Found');
            }
        } else {
            $item = new Item;
        }

        $item->id = $request->input('item_id');
        $item->title = $request->input('item_title');
        $item->description = $request->input('item_description');
        $item->user_id = $request->input('user_id');

        if($item->save()) {
            return $this->response->withItem($item, new  ItemTransformer());
        } else {
            return $this->response->errorInternalError('Could not updated/created a task');
        }

    }
}
