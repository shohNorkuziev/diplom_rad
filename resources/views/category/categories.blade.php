@extends('layout.layouts')
@section('title','Категории')
@section('content')
@if(session()->has('success'))
    <div class="content_row" style="color: green">
        {{session()->get('success')}}
    </div>
@endif
@if ($data->role=='admin')
<a href="{{ route('categories.create') }}" class="product-add">Добавить категорию</a>
@endif
<div class="content_column">
    @foreach($data->product as $prod)
        <div class="product_item product_item-block categoty-item">
            <div>
                <h2>{{$prod->name}}</h2>
                <br><br>
                @if ($data->role=='admin')
                <a href="{{route('categories.edit',$prod->id)}}">Редактировать</a>
                <br><br>
                <form action="{{route('categories.destroy',$prod->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Удалить</button>
                </form>
                @endif
            </div>
        </div>
    @endforeach
</div>
@endsection
