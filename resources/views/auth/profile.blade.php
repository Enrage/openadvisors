@extends('layouts.app')

@section('title', 'Ваш профиль, ' . Auth::user()->name)

@section('content')
<div class="profile_content">
  @if (session('status'))
    <div class="session_block"><div class="alert alert-success">{{ session('status') }}</div></div>
  @endif

  <h2>Личный кабинет:</h2>

  <div class="profile">
    <div class="profile_name">Ваше имя: <span>{{ Auth::user()->name }}</span></div>
    <div class="profile_email">Ваш email: <span>{{ Auth::user()->email }}</span></div>
    <div class="profile_phone">Ваш телефон: <span>{{ Auth::user()->phone }}</span></div>
    <div class="profile_country">Страна: <span>{{ Auth::user()->country }}</span></div>
    <div class="profile_index">Индекс: <span>{{ Auth::user()->index }}</span></div>
  </div>

  <div class="software_block">
    <a href="/profile/frv_prof" class="link">Программа ФРВ-ПРОФ</a>
  </div>

  <div class="profile_settings">
    <a href="/profile/edit">Настройки профиля</a>
  </div>
</div>
@endsection