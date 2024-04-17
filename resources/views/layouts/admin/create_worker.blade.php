@extends('welcome')
@section('title', 'Страница создания сотрудника')
@section('content')
    @include('layouts.partials.header')
    <main>
        <div>
            <form action="{{ route('create-worker') }}" method="POST">
                @csrf

                <label for="firstname">Имя</label>
                <input type="text" name="firstname" id="firstname" required><br>

                <label for="lastname">Фамилия</label>
                <input type="text" name="lastname" id="lastname" required><br>

                <label for="patronymic">Отчество</label>
                <input type="text" name="patronymic" id="patronymic"><br>

                <label for="email">Email</label>
                <input type="email" name="email" id="email" required><br>

                <label for="password">Пароль</label>
                <input type="password" name="password" id="password" required><br>

                <label for="role">Роль</label>
                <select name="role" id="">
                    <option value="" disabled selected>Выберите роль</option>
                    <option value="admin">admin</option>
                    <option value="manager">manager</option>
                    <option value="server">server</option>
                </select>

                <label for="admin-password">Пароль админа</label>
                <input type="password" name="admin-password" id="admin-password"><br>

                <input type="submit" value="Создать">
            </form>
            @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        </div>
    </main>
    @include('layouts.partials.footer')
@endsection
