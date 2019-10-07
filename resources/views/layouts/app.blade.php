<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
  <title>@yield('title')</title>
  <meta name="keywords" content="">
	<meta name="description" content="Startup HTML template OptimizedHTML 5">
	<meta name="viewport" content="width=device-width">
	<link rel="icon" href="/img/favicon.png">
	<link rel="stylesheet" href="/css/styles.min.css">
	<link rel="stylesheet" href="/css/slick.css">
	<link rel="stylesheet" href="/css/slick-theme.css">
	<link rel="stylesheet" href="/fonts/font_awesome.css">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="yandex-verification" content="cde0aba315c04898" />
</head>
<body>
<div id="wrapper">
	<div class="content">
		@include('layouts.header')
		<main id="main">
			@include('layouts.services_menu')
			<div class="container">
				@yield('content')
			</div>
		</main>
	</div>
	@include('layouts.footer')
</div>
@if ($_SERVER['REQUEST_URI'] == '/profile/frv_prof' || $_SERVER['REQUEST_URI'] == '/frv_prof')
	@include('layouts.frv_manual')
@endif
<script src="/js/common.js"></script>
</body>
</html>