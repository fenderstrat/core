<html>
<head>
	<title><?php echo $title; ?></title>

	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/template/' ?>style.css">
	<script src="<?php echo base_url().'assets/template/' ?>js/jquery-1.7.1.js"></script>
	
	<link rel="shortcut icon" href="<?php echo base_url().'assets/template/image' ?>favicon.ico" >

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
							<p><a href="#"></a></p>
						</div>
					</div>
					<div class="slide">
						<a href="#" title=""><img src="<?php echo base_url().'assets/template/' ?>image/image1.jpg" width="960" height="430" alt="Slide 2"></a>
						<div class="caption">
							<p><a href="#"></a></p>
						</div>
					</div>
					<div class="slide">
						<a href="#" title=""><img src="<?php echo base_url().'assets/template/' ?>image/image2.jpg" width="960" height="430" alt="Slide 3"></a>
						<div class="caption">
							<p><a href="#"></a></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- slider wrapper -->

	<!-- conten wrapper -->
	<div class="content-wrapper">

		<!-- main wrapper -->
		<div class="main">

			<?php $this->load->view('template/menu-kiri'); ?>

			<div class="news">

				<div class="judul">
					<h2 class="juduls">berita terbaru</h2>
					<div class="clear"></div>
				</div>
				<!-- looping arsip -->
				<?php foreach ($artikel as $newArtikel): ?>
					<div class="arsip">
						<div class="arsip-thumb">
							<a href="<?php echo base_url().'artikel/show/'.$newArtikel->artikel_id.'/'.url_title($newArtikel->judul); ?>"><img src="<?php echo base_url().'assets/uploads/'.$newArtikel->image; ?>"></a>
						</div>

						<div class="arsip-summary">
							<h3><a href="<?php echo base_url().'artikel/show/'.$newArtikel->artikel_id.'/'.url_title($newArtikel->judul); ?>"><?php echo $newArtikel->judul; ?></a>
								<span class="meta-date">Diterbitkan pada <?php echo $newArtikel->tanggal ?></span>
							</h3>

							<div class="arsip-sum-text">
								<?php echo character_limiter($newArtikel->isi, 470); ?>
							</div>
						</div>

						<div class="clear"></div>

					</div>
				<?php endforeach ?>
				<!-- looping arsip -->

			</div>

			<div class="clear"></div>

			<!-- older post -->
			<div class="older-post">

				<div>
					<h2 class="juduls">berita lainnya</h2>
					<div class="clear"></div>
				</div>

				<?php foreach ($artikel_bawah as $lain): ?>
					<div class="arsips">
						<?php if ($lain->image !=''): ?>
							<div class="arsip-thumbs">
								<a href="<?php echo base_url().'artikel/show/'.$lain->artikel_id.'/'.url_title($lain->judul); ?>"><img src="<?php echo base_url().'assets/uploads/'.$lain->image ?>"></a>
							</div>
						<?php else: ?>
							<div class="arsip-thumbs">
								<a href="<?php echo base_url().'artikel/show/'.$lain->artikel_id.'/'.url_title($lain->judul); ?>"><img src="<?php echo base_url().'assets/uploads/default.png' ?>"></a>
							</div>
						<?php endif ?>
						<div class="arsip-summarys">
							<h3><a href="<?php echo base_url().'artikel/show/'.$lain->artikel_id.'/'.url_title($lain->judul); ?>"><?php echo $lain->judul; ?>
								<span class="meta-date">Diterbitkan pada <?php echo $lain->tanggal ?></span>
							</h3>
						</div>

						<div class="clear"></div>

					</div>
				<?php endforeach ?>

				<div class="clear"></div>
			</div>
			<!-- older post -->

		</div>
		<!-- main wrapper -->

		<!-- sidebar wrapper -->
			<?php $this->load->view('template/sidebar'); ?>
		<!-- sidebar wrapper -->

		<div class="clear"></div>

	</div>
	<!-- conten wrapper -->

	<!-- footer wrapper -->
	<?php $this->load->view('template/footer'); ?>
	<!-- footer wrapper -->

</body>
</html>