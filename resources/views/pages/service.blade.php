@extends('layouts.app')

@section('title', $service[0]->title)

@section('content')
<div class="service_content">
  {!! $service[0]->content !!}
</div>
@endsection