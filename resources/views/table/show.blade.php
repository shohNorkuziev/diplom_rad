@extends('layout.layouts')
@section('title','Товар')
@section('content')
<div class="content_row">
    <div class="product_item @if($data->status === "свободна") green @else red @endif">
        <div>
            <img src="" alt="">
            <h2>{{$data->id}}</h2>
            <h3>{{$data->status}} ₽</h3>
        </div>
        <div class="content_column">
            <div class="text_content">
                <a href="{{route('tables')}}">Назад</a>
                @if (Auth::user()->role=='admin')
                <br><br>
                <a href="{{route('tables.edit',$data->id)}}">Редактировать</a>
                <br><br>
                <form action="{{route('tables.destroy',$data->id)}}" method="POST">
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
