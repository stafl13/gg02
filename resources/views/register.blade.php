@extends('layout')

@section('content')

<div class="card">
    <h2>Регистрация</h2>

    <form method="POST" action="/register">
        @csrf

        <div class="form-group">
            <label>ФИО</label>
            <input type="text" name="full_name" value="{{ old('full_name') }}">
            @error('full_name')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>Телефон</label>
            <input type="text" name="phone" placeholder="+7(999)-999-99-99" value="{{ old('phone') }}">
            @error('phone')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" value="{{ old('email') }}">
            @error('email')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>Логин</label>
            <input type="text" name="login" value="{{ old('login') }}">
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

        <button type="submit">Зарегистрироваться</button>
    </form>

    <div class="link">
        <a href="/login">Уже есть аккаунт?</a>
    </div>
</div>

@endsection