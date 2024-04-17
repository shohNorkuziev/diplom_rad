@extends('layout.layouts')
@section('title','Admin')
@section('content')
<div class="content_row">
    <h2 class="header-title">Добавление товара</h2>
    @if(session()->has('success'))
        <div class="content_row" style="color: red">
            {{session()->get('success')}}
        </div>
    @endif
    <div>
        <form action="{{route('products.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form_group">
                <input class="input-create" type="text" name="name" placeholder="Введите название" value="" required>
            </div>
            <div class="form_group">
                <input class="input-create" type="number" name="price" placeholder="Введите стоимость" value="" required>
            </div>
            <div class="form_group">
                <input class="input-create" type="number" name="qty" placeholder="Введите количество" value="" required>
            </div>
            <div class="form_group">
                <input class="input-create" type="text" name="description" placeholder="Введите описание" value="">
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
                <input class="input-create" type="file" name="image" required>
            </div>
            <div class="form_group">
                <input class="input-create" type="submit"value="Добавить">
            </div>
        </form>
    </div>
</div>
@endsection
