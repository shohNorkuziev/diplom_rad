@extends('layout.layouts')
@section('title','Admin')
@section('content')
<div class="content_row">
    <h2 class="header-title">Изменение товара</h2>
    <div>
        <form action="{{route('products.update',$pro)}}" method="post">
            @csrf
            @method('PUT')
            <div class="form_group">
                <input class="input-create" type="text" name="name" placeholder="Введите название" value="{{$pro->name}}" required>
            </div>
            <div class="form_group">
                <input class="input-create" type="number" name="price" placeholder="Введите стоимость" value="{{$pro->price}}" required>
            </div>
            <div class="form_group">
                <input class="input-create" type="number" name="qty" placeholder="Введите количество" value="{{$pro->qty}}" required>
            </div>
            <div class="form_group">
                <input class="input-create" type="text" name="description" placeholder="Введите описание" value="{{$pro->description}}">
            </div>
            <select class="input-create" name="category_id" id="">
                <option disabled selected>Выберите категорию</option>
                @foreach ($category as $categ)
                    <option value="{{$categ->id}}">
                        {{$categ->name}}
                    </option>
                @endforeach
            </select>
            <div class="form_group">
                <input class="input-create" type="submit"value="Изменить">
            </div>
        </form>
    </div>
</div>
@endsection
