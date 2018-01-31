@extends('templates.master')


@section('page-title')
    Item
@endsection

@section('content-view')
    <div class="form-control border-0">
        <h1>Item Form</h1>
        @include('templates.form.message-alert')
        {!! Form::open(['route' => 'item.store','method' => 'POST']) !!}
        @include('item.form-fields')
        <div class="form-group col-md-6">
            @include('templates.form.submit', ['input' => 'Cadastrar'])
        </div>
        {!! Form::close() !!}
    </div>
@endsection
