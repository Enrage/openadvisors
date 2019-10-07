@extends('layouts.app')

@section('title', 'Openadvisors')

@section('content')
<div class="main_slider">
  <div class="slider_content">
    <a href="#" style="background:url(/img/_src/bg1.jpg); background-size:cover;"></a>
    <a href="#" style="background:url(/img/_src/bg2.jpg); background-size:cover;"></a>
    <a href="#" style="background:url(/img/_src/bg3.jpeg); background-size:cover;"></a>
    <a href="#" style="background:url(/img/_src/bg4.jpg); background-size:cover;"></a>
    <a href="#" style="background:url(/img/_src/bg5.jpg); background-size:cover;"></a>
  </div>
</div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="/js/slick.min.js"></script>
<script type="text/javascript">
$(document).ready(function () {
	$('.slider_content').slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		autoplay: true,
		autoplaySpeed: 3000,
		infinite: true,
		fade: true,
		speed: 1800,
		dots: true,
		prevArrow: '<button type="button" class="slick-prev"><</button>',
		nextArrow: '<button type="button" class="slick-next">></button>'
	});
});
</script>