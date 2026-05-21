@extends('layout')

@section('content')

<div class="card">
    <h2>Личный кабинет</h2>

    <p style="margin-bottom: 20px; text-align:center;">
        Добро пожаловать, {{ auth()->user()->full_name }}
    </p>

    <form method="POST" action="/logout">
        @csrf
        <button type="submit">Выйти</button>
    </form>
</div>

@endsection