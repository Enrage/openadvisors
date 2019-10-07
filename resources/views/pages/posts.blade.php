@extends('layouts.app')

@section('title', 'Публикации Openadvisors')

@section('content')
<div class="posts">
  <h3>Публикации Openadvisors</h3>
  <table class="posts">
    <tr>
      <th>Статья</th>
      <th>Автор</th>
      <th>Ссылка</th>
    </tr>
    @foreach ($posts as $post)
    <tr>
      <td><h2>{{ $post->title }}</h2></td>
      <td>{{ $post->author }}</td>
      <td><a href="/post/{{ $post->slug }}" class="post_link">Посмотреть</a></td>
    </tr>
    @endforeach
  </table>
</div>
@endsection