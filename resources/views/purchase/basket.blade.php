@extends('layout.layouts')
@section('title','Корзина')
@section('content')
<div class="content_row">
    <h2>Корзина</h2>
    <div class="content_column">
        @if (count($data->basket)>0)
            @foreach($data->basket as $prod)
            <div class="product_item-v" >
                <a href="/products/{{$prod->id}}">
                    <div class="product_item product_item-block">
                        <div>
                            <img src="{{asset('public/'.$prod->image)}}" alt="{{$prod->name}}" class="product_img">
                            <h2>{{$prod->name}}</h2>
                            <h3>{{$prod->price}} ₽</h3>
                            <h3>Количество:{{$prod->qty}}</h3>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        @else
            <h1>Корзина пуста</h1>
        @endif

    </div>
</div>
@endsection
