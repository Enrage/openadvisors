@extends('layouts.app')

@section('title', 'Авторизоваться на сайте Openadvisors')

@section('content')
<div class="login_page">
  <div class="form_page">
    <h4 class="title_login_page">Войти в личный кабинет</h4>

    @if (session('status'))
    <div class="alert alert-success">{{ session('status') }}</div>
    @endif
    @if (session('warning'))
    <div class="alert alert-warning">{{ session('warning') }}</div>
    @endif

    <form id="login_form" method="POST" action="{{ route('login') }}">
      @csrf
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
        <div class="form-check">
          <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
          <label for="remember">Запомнить меня</label>
        </div>
      </div>
      <div class="bottom_btns">
        <button type="submit" class="login_in">Войти</button>
        @if (Route::has('password.request'))
          <a href="{{ route('password.request') }}" class="forget_pass">Забыли пароль?</a>
        @endif
      </div>
    </form>
  </div>
</div>
@endsection