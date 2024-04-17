@extends('layout.layouts')
@section('title','Авторизация')
@section('content')
<div class="content_row">
    <h2>Авторизация</h2>
    <div>
        @if(session()->has('success'))
        <div>
            {{session()->get('success')}}
        </div>
        @endif
        <form action="{{route('signup')}}" method="post" name="signup">
            @csrf
            <div class="form_group">
                <input class="input-create" type="email" name="email" placeholder="Введите email" value="" required>
            </div>
            <div class="form_group">
                <input class="input-create" type="password" name="password" placeholder="Введите пароль" value="" required>
            </div>
            <div class="form_group">
                <input class="input-create" type="submit"value="Авторизация">
            </div>
        </form>
    </div>
</div>
@endsection
