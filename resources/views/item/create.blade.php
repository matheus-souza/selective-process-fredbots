@extends('templates.master')


@section('page-title')
    Item
@endsection

@section('content-view')
    <div class="form-control border-0">
        <h1>Item Form</h1>
        @include('templates.form.message-alert')
        {!! Form::open(['route' => 'item.store','method' => 'POST', 'files' => true]) !!}
        @include('item.form-fields')
        {!! Form::hidden('user_id', auth()->user()->id) !!}
        <div class="form-group col-md-6">
            {!! Form::file('image'); !!}
        </div>
        <div class="form-group col-md-6">
            @include('templates.form.submit', ['input' => 'Save'])
        </div>
        {!! Form::close() !!}
    </div>
@endsection
