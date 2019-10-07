@extends('layouts.app')

@section('title', $service[0]->title)

@section('content')
<div class="service_content">
  <h2 class="service_title">{{ $service[0]->title }}</h2>
  <div>{!! $service[0]->content !!}</div>

  <div class="sub_services">
    <ul>
    @foreach ($sub_services as $item)
      <li><a href="/service/{{ $item->slug }}" class="service_link">{{ $item->title }}</a></li>
    @endforeach
    </ul>
  </div>
</div>
@endsection