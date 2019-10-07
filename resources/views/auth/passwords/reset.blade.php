@extends('layouts.app')

@section('content')
<div class="login_page">

  @error('email')
    <div class="session_block"><div class="alert alert-danger">{{ $message }}</div></div>
  @enderror

  @error('password')
    <div class="session_block"><div class="alert alert-danger">{{ $message }}</div></div>
  @enderror

  <div class="form_page">
    <h4 class="title_login_page">Задать новый пароль</h4>

    <div class="card-body">
      <form id="login_form" method="POST" action="{{ route('password.update') }}">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">

        <div class="form-group row">
          <div><label for="email">Введите Email:</label></div>
          <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="off" placeholder="Введите Email" readonly onfocus="this.removeAttribute('readonly')">
        </div>

        <div class="form-group row">
          <div><label for="password">Новый пароль:</label></div>
          <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" required readonly onfocus="this.removeAttribute('readonly')">
        </div>

        <div class="form-group row">
          <div><label for="password-confirm">Повторить новый пароль:</label></div>
          <input id="password-confirm" type="password" name="password_confirmation" required readonly onfocus="this.removeAttribute('readonly')">
        </div>

        <div class="form-group">
          <button type="submit" class="send_pass_reset_link">Сбросить пароль</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection