@extends('layout')

@section('content')

<div class="card">
    <h2>Авторизация</h2>

    @if(session('success'))
        <div class="success">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="/login">
        @csrf

        <div class="form-group">
            <label>Логин</label>
            <input type="text" name="login">
            @error('login')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>Пароль</label>
            <input type="password" name="password">
            @error('password')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit">Войти</button>
    </form>

    <div class="link">
        <a href="/register">Создать аккаунт</a>
    </div>
</div>

@endsection