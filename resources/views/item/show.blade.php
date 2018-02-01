@extends('templates.master')

@section('page-title')
    Item
@endsection

@section('content-view')

    <div class="form-control border-0">
        <h1>{{ $item->title }}</h1>
        <div class="container">
            <div class="row">
                <div class="col">
                    <img src="" />
                </div>
                <div class="col">
                    <p>{{ $item->description }}</p>
                </div>
            </div>
        </div>
        <h3>Posted by [Name] on {{ $item->created_at }}.</h3>
        <div class="container">
            <div class="row">
                <div class="col"></div>
                <div class="col">
                    <div class="navbar justify-content-between">
                        <h1 class="navbar-brand"></h1>
                        <form class="form-inline">
                            <a href="{{ route('item.create') }}" class="btn btn-secondary">Add Item</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection