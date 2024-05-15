@extends('layout.layouts')
@section('title','Создание сотрудника')
@section('content')
<div class="content_row">
    @if (session()->has('success'))
        <div class="content_row" style="color: green">
            {{session()->get('success')}}
        </div>
    @endif
    @if (session()->has('error'))
        <div class="content_row" style="color: red">
            {{session()->get('error')}}
        </div>
    @endif
    <h2>Все сотрудники</h2>
        <div class="content_column">
            @foreach($data->users as $user)
                {{-- <a href="{{route('tables.show',$table->id)}}"> --}}
                <div class="table_item">
                    <h2>ФИО: {{$user->firstname}} {{$user->lastname}} {{$user->patronymic}}</h2>
                    <h2>Должность: {{$user->role}}</h2>
                    <h2>Почта: {{$user->email}}</h2>
                    <div>
                        <form action="{{route('users.destroy',$user->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Удалить</button>
                        </form>
                        <a href="{{route('users.edit',["user"=>$user->id])}}">Изменить</a>
                    </div>
                </div>
                {{-- </a> --}}
            @endforeach
        </div>
</div>
@endsection
