@extends('layouts.app')

@section('title', $post->title)

@section('content')
<div class="post_content">
  <h1> {{ $post->title }}</h1>
  {!! $post->content !!}
  <div class="source">
    @if (!empty($post->author))
      <div class="post_author">Автор: <span>{{ $post->author }}</span></div>
    @endif
    @if (!empty($post->source))
      <div class="post_source">Источник: <span>{{ $post->source }}</span></div>
    @endif
  </div>
</div>
@endsection