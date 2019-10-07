@extends('layouts.app')

@section('title', $page[0]->title)

@section('content')
  <div class="page_content">
    <h2>{{ $page[0]->title }}</h2>
    {!! $page[0]->content !!}
    @if ($page[0]->slug == 'services')
    <div class="services_list">
      <ul>
      @foreach ($services_list as $service)
        <li><a href="/service/{{ $service->slug }}">{{ $service->title }}</a></li>
      @endforeach
      </ul>
    </div>
    @endif

  </div>
  @if ($page[0]->slug == 'seminar')
    <link rel="stylesheet" href="/css/lightgallery.css">
    <script src="/js/lightgallery.min.js"></script>
    <script type="text/javascript">
      lightGallery(document.getElementById('reviews'));
    </script>
  @endif
@endsection