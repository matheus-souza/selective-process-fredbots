@extends('templates.master')

@section('page-title')
    Item
@endsection

@section('content-view')

    <div class="form-control border-0">
        <h1>Item Form</h1>
        @include('templates.form.message-alert')

        {!! Form::model($item, ['route' => ['item.update', $item->id],'method' => 'PUT']) !!}
        @include('item.form-fields')
        <div class="form-group col-md-6">
            @if($item->user->id == auth()->user()->id)
                @include('templates.form.submit', ['input' => 'Save'])
            @endif
        </div>
        {!! Form::close() !!}
    </div>

@endsection