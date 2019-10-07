<nav class="top_menu">
  <div class="top_menu_btn"><i class="fa fa-bars" aria-hidden="true"></i></div>
  <ul class="top_menu_list">
    <li><a href="/">Главная</a></li>
    <li><a href="/posts">Публикации</a>
    @foreach ($pages as $page)
      @if ($page->children->count())
      <li><a href="/page/{{ $page->slug }}">{{ $page->title }}</a>
        <ul>
        @foreach ($page->children as $child)
          <li><a href="/page/{{ $child->slug }}">{{ $child->title }}</a></li>
        @endforeach
        </ul>
      </li>
      @else
      <li><a href="/page/{{ $page->slug }}">{{ $page->title }}</a></li>
      @endif
    @endforeach
    <li><a href="http://lean-center.org" target="_blank">Lean-center</a></li>
  </ul>
</nav>