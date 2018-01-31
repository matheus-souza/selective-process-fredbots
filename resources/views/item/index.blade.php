@extends('templates.master')

@section('page-title')
    Items
@endsection

@section('content-view')

    <div class="container">
        <div class="row">
            <div class="col">
                <h2>Item of the Day</h2>
                <img src="" />
                <h3>Item title</h3>
                <h4>Author Name</h4>
                <a href="{{ route('item.index') }}" class="btn btn-secondary">All Items</a>
            </div>
            <div class="col">
                <h2>Latest Addition</h2>
                <img src="" />
                <h3>Item title</h3>
                <h4>Author Name</h4>
                <a href="{{ route('item.create') }}" class="btn btn-secondary">Add Item</a>
            </div>
        </div>
    </div>

@endsection