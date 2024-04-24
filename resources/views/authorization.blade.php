@extends('layout')
@section('content')
<div class="container">
    @if(Auth::user())
        @php
            header("Location: /types_of_activity");
            exit;
        @endphp
    @else
    <form class="form-signin" method="post" action="{{ url('auth') }}">
        @csrf
        <h1 class="h3 mb-3 font-weight-normal">Авторизация</h1>
        <label for="inputEmail" class="sr-only">Email</label>
        <input type="email" id="inputEmail" class="form-control mb-3" placeholder="Email" required autofocus name="email" value="{{ old('email') }}">
        <label for="inputPassword" class="sr-only">Пароль</label>
        <input type="password" id="inputPassword" class="form-control mb-3" placeholder="Пароль" required name="password">
        <div class="text-center mt-3">
            <button class="btn btn-dark btn-lg" type="submit">Войти</button>
            <a href="{{ url('register') }}" class="btn btn-dark btn-lg">Регистрация</a>
        </form>
    </div>


    @endif
</div>
@endsection
