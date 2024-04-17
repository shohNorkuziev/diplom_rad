@extends('layout.layouts')
@section('title','Товары')
@section('content')
<nav class="filtr">
    <a href="sort/1/name">По наименованию</a>
    <a href="sort/1/price">По цене</a>
    <a href="sort/1/price">По новизне</a>
    <select name="select_filtr" class="categoty" id="" onchange="filtr()">
        <option value="Все" selected>Все</option>
        @foreach ($data->category as $categ)

            <option value="{{$categ->id}}">
                {{$categ->name}}
            </option>
        @endforeach
    </select>
</nav>
@if ($data->role=='admin')
<a href="{{ route('products.create') }}" class="product-add">Добавить товар</a>
@endif
@if(session()->has('success'))
    <div class="content_row" style="color: green">
        {{session()->get('success')}}
    </div>
@endif
<div class="content_column">
    @foreach($data->product as $prod)
    <div class="product_item-v" data-category="{{ $prod->category_id }}">
        <a href="/products/{{$prod->id}}">
            <div class="product_item product_item-block">
                <div>
                    <img src="{{asset('public/'.$prod->image)}}" alt="{{$prod->name}}" class="product_img">
                    <h2>{{$prod->name}}</h2>
                    <h3>{{$prod->price}} ₽</h3>
                </div>
            </div>
        </a>
    </div>
    @endforeach
</div>
@endsection
