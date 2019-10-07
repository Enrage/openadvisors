<header id="header">
  <div class="container">
    @include('layouts.top_menu')
  </div>

  <div class="reg_block">
    <div class="container">
      <div class="logo">
        <a href="/" title="Открытые инновации"><img src="/img/_src/openadvisors.png" alt="Открытые инновации"></a>
      </div>

      <div class="contacts">
        <div class="phone">Тел: +7(495)723-18-50</div>
        <div class="email">Email: <a href="mailto:inf@openadvisors.ru">info@openadvisors.ru</a></div>
      </div>

      <div class="search_auth_block">
        {{-- <div class="search">
          <form action="/search" class="search_form" method="post">
            <input type="text" name="search" id="search">
            <input type="submit" value="" id="submit_search">
            <i class="fa fa-search" aria-hidden="true"></i>
          </form>
        </div> --}}

        @if (!Auth::user())
        <div class="auth">
          <a href="/login" class="login">Войти</a>
          <a href="/register" class="register">Зарегистрироваться</a>
        </div>
        @else
        <div class="account_name">
          Вы вошли как <a href="/profile" class="profile_link">{{ Auth::user()->name }}</a><a href="/logout" class="logout">(Выйти)</a>
        </div>
        @endif
      </div>
    </div>
  </div>
</header>