@extends('layouts.app')

@section('title', 'Редактировать профиль')

@section('content')
<div class="profile_content">
  <h2>Личный кабинет:</h2>
  <h3 class="profile_title">Редактировать профиль</h3>

  <div class="edit_profile">
    <form action="/profile/update" method="post" class="edit_profile_form">
      @csrf
      <label for="name">Имя:</label>
      <input type="text" name="name" id="name" value="{{ Auth::user()->name }}">
      {{-- <label for="email">Email:</label>
      <input type="email" name="email" id="email" value="{{ Auth::user()->email }}"> --}}
      <label for="phone">Телефон:</label>
      <input type="phone" name="phone" id="phone" value="{{ Auth::user()->phone }}">
      <label for="country">Страна:</label>
      <input type="text" name="country" id="country" value="{{ Auth::user()->country }}">
      <label for="index">Индекс:</label>
      <input type="text" name="index" id="index" value="{{ Auth::user()->index }}">
      <div class="error">Правильно заполните поля!</div>
      <input type="submit" value="Сохранить" id="save_profile">
    </form>
  </div>
</div>
@endsection