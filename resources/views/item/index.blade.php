@extends('templates.master')

@section('page-title')
    Items
@endsection

@section('content-view')

    <div class="container">
        <div class="row">
            <div class="col">
                <h2>Item of the Day</h2>
                <img src="{{ url("storage/items/{$itemDay->image}") }}" />
                <h3>Item title</h3>
                <h3>{{ $itemDay->title }}</h3>
                <h4>{{ $itemDay->user->name }}</h4>
                <a href="{{ route('item.index') }}" class="btn btn-secondary">All Items</a>
            </div>
            <div class="col">
                <h2>Latest Addition</h2>
                @if(!is_null($itemPreviusDay))
                    <img src="{{ url("storage/items/{$itemPreviusDay->image}") }}" />
                    <h3>{{ $itemPreviusDay->title }}</h3>
                    <h4>{{ $itemPreviusDay->user->name }}</h4>
                @endif
                <a href="{{ route('item.create') }}" class="btn btn-secondary">Add Item</a>
            </div>
        </div>
    </div>

@endsection