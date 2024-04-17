@extends('layout.layouts')
@section('title','Admin')
@section('content')
<div class="content_row">
    <h2 class="header-title">Изменение категории</h2>
    <div>
        <form action="{{route('categories.update',$pro)}}" method="post">
            @csrf
            @method('PUT')
            <div class="form_group">
                <input class="input-create" type="text" name="name" placeholder="Введите название" value="{{$pro->name}}" required>
            </div>
            <div class="form_group">
                <input class="input-create" type="submit"value="Изменить">
            </div>
        </form>
    </div>
</div>
@endsection
