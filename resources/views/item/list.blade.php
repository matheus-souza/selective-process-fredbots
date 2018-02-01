@extends('templates.master')

@section('page-title')
    Items
@endsection

@section('content-view')
    @include('templates.form.message-alert')

    @php($itemDeleteRoute = [])
    @php($itemEditRoute = [])
    @php($itemShowRoute = [])
    @php($itemBlockEdit = [])
    @php($itemBlockDelete = [])

    @foreach($items as $item)
        @php($itemDeleteRoute[$item->id] = route('item.destroy', $item->id))
        @php($itemEditRoute[$item->id] = route('item.edit', $item->id))
        @php($itemShowRoute[$item->id] = route('item.show', $item->id))
        @php($itemBlockEdit[$item->id] = $item->user->id != auth()->user()->id)
        @php($itemBlockDelete[$item->id] = $item->user->id != auth()->user()->id)
    @endforeach

    <table-items items="{{ $items }}"
                 url_delete="{{ json_encode($itemDeleteRoute) }}"
                 url_edit="{{ json_encode($itemEditRoute) }}"
                 url_show="{{ json_encode($itemShowRoute) }}"
                 block_edit="{{ json_encode($itemBlockEdit) }}"
                 block_delete="{{ json_encode($itemBlockDelete) }}"
    ></table-items>
    <div class="navbar justify-content-between">
        <h1 class="navbar-brand"></h1>
        <form class="form-inline">
            <a href="{{ route('item.create') }}" class="btn btn-secondary">Add Item</a>
        </form>
    </div>
@endsection