<html>
<head>
	<title><?php echo $title; ?></title>
	
	<meta charset="UTF-8">
	<meta name=description content="<?php echo $description; ?>">
	<meta name="keyword" content="<?php echo $tag; ?>">
			
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/template/' ?>style.css">
	<script src="<?php echo base_url().'assets/template/' ?>js/jquery-1.7.1.js"></script>
	
	<link rel="shortcut icon" href="http://kpu-bengkuluprov.go.id/kpu/templates/gk_memovie/favicon.ico" >

	<!--slider need-->
	<script src="<?php echo base_url().'assets/template/' ?>js/slides.min.jquery.js"></script>
	<script>
		$(function(){
			$('#slides').slides({
				preload: true,
				preloadImage: 'img/loading.gif',
				effect: 'slide',
				play: 5000,
				pause: 2500,
				hoverPause: true,
				animationStart: function(current){
					$('.caption').animate({
						bottom:-35
					},100);
					if (window.console && console.log) {
						// example return of current slide number
						console.log('animationStart on slide: ', current);
					};
				},
				animationComplete: function(current){
					$('.caption').animate({
						bottom:0
					},200);
					if (window.console && console.log) {
						// example return of current slide number
						console.log('animationComplete on slide: ', current);
					};
				},
				slidesLoaded: function() {
					$('.caption').animate({
						bottom:0
					},200);
				}
			});
		});
	</script>
	<!--slider need-->
</head>
<body>

	<!-- header wrapper -->
	<div class="header-wrapper">
		<div class="header">

			<div class="logo kiri">
				<h1><a href="<?php echo base_url(); ?>"><img src="<?php echo base_url().'assets/template/' ?>image/logo.png"></a></h1>
			</div>

			<div class="search kanan">
				<form>
					<input type="text" placeholder="Cari...">
					<input type="submit" value="Cari">
				</form>
			</div>

			<div class="clear"></div>

		</div>
	</div>
	<!-- header wrapper -->

	<!-- slider wrapper -->
	<div class="slider-wrapper">
		<div class="slider">
			<div id="slides">
				<div class="slides_container">
					<div class="slide">
						<a href="#" title=""><img src="<?php echo base_url().'assets/template/' ?>image/slider.jpg" width="960" height="430" alt="Slide 1"></a>
						<div class="caption" style="bottom:0">
							<p><a href="">Contoh Judul Slider</a></p>
						</div>
					</div>
					<div class="slide">
						<a href="#" title=""><img src="<?php echo base_url().'assets/template/' ?>image/image1.jpg" width="960" height="430" alt="Slide 2"></a>
						<div class="caption">
							<p>Taxi</p>
						</div>
					</div>
					<div class="slide">
						<a href="#" title=""><img src="<?php echo base_url().'assets/template/' ?>image/image2.jpg" width="960" height="430" alt="Slide 3"></a>
						<div class="caption">
							<p><a href="#asdasd">Happy Bokeh raining Day</a></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- slider wrapper -->