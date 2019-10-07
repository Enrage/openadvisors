@extends('layouts.app')

@section('title', 'Openadvisors - сбросить пароль')

@section('content')
<div class="login_page">
  @if (session('status'))
    <div class="session_block"><div class="alert alert-success">{{ session('status') }}</div></div>
  @endif

  @error('email')
    <div class="session_block"><div class="alert alert-danger">{{ $message }}</div></div>
  @enderror

  <div class="form_page reset_pass_form">
    <h4 class="title_login_page">Забыли пароль?</h4>

    <form id="login_form" class="reset_pass_form" method="POST" action="{{ route('password.email') }}">
      @csrf
      <div class="form-group row">
        <div><label for="email">Email:</label></div>
        <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="" required autocomplete="off" placeholder="Введите Email">
      </div>

      <div class="form-group">
        <button type="submit" class="send_pass_reset_link">Сбросить пароль</button>
      </div>
    </form>
  </div>
</div>
@endsection