@extends('welcome')
@section('title', 'Вход')
@section('content')
@include('layouts.partials.header')
<main>
<div>
    <h1>Вход</h1>
    <form method="POST" action="{{ route('signin') }}">
        @csrf
        <div>
            <label for="email">
                Email
            </label>
            <input id="email" type="email" placeholder="Email" name="email" value="{{ old('email') }}" required autofocus>
            @error('email')
                <p>{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-6">
            <label for="password">
                Password
            </label>
            <input id="password" type="password" placeholder="Password" name="password" required>
            @error('password')
                <p>{{ $message }}</p>
            @enderror
        </div>
        <div>
            <button type="submit">
                Вход
            </button>
        </div>
    </form>
</div>
</main>
@include('layouts.partials.footer')
@endsection
