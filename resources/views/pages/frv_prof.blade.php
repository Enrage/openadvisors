@extends('layouts.app')

@section('title', 'FRV Prof')

@section('content')
<div class="profile_content">


  <div class="frv_form">
    <form action="/" method="post" id="first_frv_form" class="b-show">
      <h2 class="profile_title">ФРВ-проф</h2>
      <div><label for="frv_name">
        <p>Briefly note what and whom are to be studied:</p>
        <p>Кратко запишите, что и кого нормируем:</p>
      </label></div>
      <input id="frv_name" type="text" value="" name="frv_name" placeholder="Что и кого нормируем?" required>
      <p class="name_cond">(< 100 symbols/символов)</p>
      <div class="error"></div>
      <button class="frv_start">
        <p>Start</p>
        <p>Старт</p>
      </button>
      <div class="frv_bottom">
        <button class="frv_logout_btn">
          <p>Logout</p>
          <p>Выйти из ПО</p>
        </button>
        <button class="frv_manual_btn">
          <p>Manual how to use the software</p>
          <p>Инструкция по пользованию ПО</p>
        </button>
      </div>
    </form>

    <form action="/" method="post" id="second_frv_form" class="b-hidden">
      <div class="advertising">
        <a href="http://lean-center.org/" target="_blank"><img src="/img/_src/banners/lean.gif" alt="Banner"></a>
      </div>
      <h2 class="profile_title">ФРВ-проф</h2>
      <div><label for="frv_comment">Comment/Комментарий:</label></div>
      <input type="text" value="" name="frv_comment" id="frv_comment">
      <p class="comment_cond">(< 100 symbols/символов)</p>
      <div>
        <label for="frv_code">Code/Код:</label>
        <input type="number" min="1" max="999" value="" name="frv_code" id="frv_code" required>
      </div>
      <div class="error_2"></div>
      <div class="frv_bottom">
        <button class="frv_finish">
          <p>Finish</p>
          <p>Финиш</p>
        </button>
        <button class="frv_done">
          <p>Done!</p>
          <p>Сделано!</p>
        </button>
      </div>
    </form>

  </div>

  <div class="b-hidden" id="frv_result_block">
    <div class="frv_result_text"></div>
    <div class="bottom_btns">
      <button class="frv_to_account">
        <p>To my account</p>
        <p>В мой кабинет</p>
      </button>
      <button class="frv_one_more">
        <p>One more</p>
        <p>Отнормировать еще</p>
      </button>
    </div>
  </div>
</div>
@endsection