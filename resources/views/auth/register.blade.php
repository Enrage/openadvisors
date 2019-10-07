@extends('layouts.app')

@section('title', 'Авторизоваться на сайте Openadvisors')

@section('content')
<div class="login_page">
  <div class="form_page">
    <h4 class="title_login_page">Регистрация на сайте</h4>

    @if (session('status'))
    <div class="alert alert-success">{{ session('status') }}</div>
    @endif
    @if (session('warning'))
    <div class="alert alert-warning">{{ session('warning') }}</div>
    @endif

    <form id="login_form" method="POST" action="{{ route('register') }}">
      @csrf
      <div class="form-group row">
        <div><label for="name">Ваше имя:</label></div>
        <input id="name" type="text" class="@error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required placeholder="Введите имя">

        @error('name')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>

      <div class="form-group row">
        <div><label for="email">Email:</label></div>
        <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="" autocomplete="off" required placeholder="Введите Email" readonly onfocus="this.removeAttribute('readonly')">
        @error('email')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>

      <div class="form-group row">
        <div><label for="password">Пароль:</label></div>
        <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" required readonly onfocus="this.removeAttribute('readonly')">

        @error('password')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>

      <div class="form-group row">
        <div><label for="password-confirm">Повторите пароль:</label></div>
        <input id="password-confirm" type="password" name="password_confirmation" required>
      </div>

      <div class="bottom_btns">
        <button type="submit" class="register">Зарегистрироваться</button>
      </div>
    </form>
  </div>
</div>
@endsection