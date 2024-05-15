@extends('layout.layouts')
@section('title','Создание сотрудника')
@section('content')
<div class="content_row">
    <h2>Создание сотрудника</h2>
    <div>
        @if(session()->has('success'))
        <div>
            {{session()->get('success')}}
        </div>
        @endif
        <form action="{{route('store')}}" method="post" name="login">
            @csrf
            <div class="form_group">
                <input class="input-create" type="text" name="firstname" placeholder="Введите имя" value="" required>
            </div>
            <div class="form_group">
                <input class="input-create" type="text" name="lastname" placeholder="Введите фамилию" value="" required>
            </div>
            <div class="form_group">
                <input class="input-create" type="text" name="patronymic" placeholder="Введите отчество" value="">
            </div>
            <div class="form_group">
                <input class="input-create" type="radio" name="gender" value="М" required>М
                <input class="input-create" type="radio" name="gender" value="Ж" required>Ж
            </div>
            <div class="form_group">
                <input class="input-create" type="email" name="email" placeholder="Введите email" value="" required>
            </div>
            <div class="form_group">
                <input class="input-create" type="password" name="password" placeholder="Введите пароль" value="" required>
            </div>
            <label for="role">Роль</label>
            <select name="role" id="">
                <option value="" disabled selected>Выберите роль</option>
                <option value="admin">admin</option>
                <option value="manager">manager</option>
                <option value="server">server</option>
            </select>

            <label for="admin-password">Пароль админа</label>
            <input type="password" name="admin-password" id="admin-password"><br>
            <div class="form_group">
                <input class="input-create" type="submit"value="Создать">
            </div>
        </form>
    </div>
</div>
@endsection
