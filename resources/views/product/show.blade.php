@extends('layout.layouts')
@section('title','Товар')
@section('content')
<div class="content_row">
    <div class="product_item">
        <div>
            <img src="" alt="">
            <h2>{{$data->name}}</h2>
            <h3>{{$data->price}} ₽</h3>
        </div>
        <div class="content_column">
            <div class="text_content">
                <img src="{{asset('public/'.$data->image)}}" alt="{{$data->name}}" class="product_img">
                <h3>
                    Описание:
                </h3>
                <hr>
                <p>
                    Катерогия:{{$data->category}}
                </p>
                <p>
                    Характеристики:{{$data->description}}
                </p>
                <a href="{{route('catalog')}}">Назад</a>
                @if ($data->role=='admin')
                <br><br>
                <a href="{{route('products.edit',$data->id)}}">Редактировать</a>
                <br><br>
                <form action="{{route('products.destroy',$data->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Удалить</button>
                </form>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
