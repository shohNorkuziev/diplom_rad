@extends('layout.layouts')
@section('title','Admin')
@section('content')
<div class="content_row">
    <h2 class="header-title">Добавление категории</h2>
    @if(session()->has('success'))
        <div class="content_row" style="color: red">
            {{session()->get('success')}}
        </div>
    @endif
    <div>
        <form action="{{route('categories.store')}}" method="post">
            @csrf
            <div class="form_group">
                <input class="input-create" type="text" name="name" placeholder="Введите название" value="" required>
            </div>
            <div class="form_group">
                <input class="input-create" type="submit"value="Добавить">
            </div>
        </form>
    </div>
</div>
@endsection
