@extends('layout.layouts')
@section('title','Столы')
@section('content')
@if (Auth::user()->role=='admin' || Auth::user()->role=='manager')
{{-- <a href="{{ route('tables.create') }}" class="table-add">Добавить стол</a> --}}
@endif
@if(session()->has('success'))
    <div class="content_row" style="color: green">
        {{session()->get('success')}}
    </div>
@endif
@if(session()->has('error'))
    <div class="content_row" style="color: red">
        {{session()->get('error')}}
    </div>
@endif
<div class="content_row">
    <h2>Столы</h2>
    <div class="content_column">
        @foreach($data->tables as $table)
            <a href="{{route('tables.show',$table->id)}}">
            <div class="product_item-v">
                <h2>Номер стола: {{$table->id}}</h2>
                <h2>Статус: {{$table->status}}</h2>
            </div>
            </a>
        @endforeach
    </div>
</div>
@endsection
