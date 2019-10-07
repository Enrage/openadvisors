<div class="service_menu">
  <nav class="categories">
    <ul>
    @foreach ($services as $service)
      @if ($service->children->count())
      <li>
        <h4><a href="/service/{{ $service->slug }}">{{ $service->title }}</a></h4>
        <ul>
          @foreach ($service->children as $child)
          <li><a href="/service/{{ $child->slug }}">{{ $child->title }}</a></li>
          @endforeach
        </ul>
      </li>
      @else
      <li><h4><a href="/service/{{ $service->slug }}">{{ $service->title }}</a></h4></li>
      @endif
    @endforeach
    </ul>
  </nav>
</div>