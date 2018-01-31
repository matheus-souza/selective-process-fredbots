@extends('templates.master')

@section('page-title')
    Items
@endsection

@section('content-view')
    <table-items items="{{ $items }}"></table-items>
@endsection