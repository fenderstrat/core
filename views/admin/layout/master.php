<!DOCTYPE html>
<html lang="id">
<head>
	<title><?= $title ?></title>
	<!-- Load CSS -->
	<?= link_tag('assets/css/bootstrap.min.css') ?>
	<?= link_tag('assets/css/font-awesome.min.css') ?>
	<?= link_tag('assets/css/ionicons.min.css') ?>
	<?= link_tag('assets/css/anpanel.css') ?>
	<?= link_tag('assets/js/plugins/bootstrap-datetimepicker/bootstrap-datetimepicker.min.css') ?>
	<?= link_tag('assets/css/iCheck/all.css') ?>
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
	<!-- Load JS -->
	<?= script_tag('assets/js/jquery-2.0.2.min.js') ?>
	<?= script_tag('assets/js/jquery-ui-1.10.3.min.js') ?>
	<?= script_tag('assets/js/bootstrap.min.js') ?>

</head>
<body  class="skin-blue">

	<header class="header">
		<a href="<?= base_url('admin') ?>" class="logo">
			<!-- Add the class icon to your logo image or logo icon to add the margining -->
            <?= img(array('src'=>'assets/img/anpanel.png', 'alt'=>'logo')) ?>
		</a>

		<!-- Load Navigation -->
		<?php $this->load->view('admin/layout/navigation') ?>
		
		<div class="wrapper row-offcanvas row-offcanvas-left">
			<!-- Load Sidebar -->
			<?php $this->load->view('admin/layout/sidebar') ?>

			<!-- Right side column. Contains the navbar and content of the page -->
			<aside class="right-side">                

				<!-- Content Header (Page header) -->
				<section class="content-header">
					<h1>
						Dashboard
						<small>aNPanel</small>
					</h1>
					<!-- <ol class="breadcrumb">
						<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
						<li class="active">Blank page</li>
					</ol> -->
				</section>

				<!-- Main content -->
				<section class="content">
					<?php $this->load->view($template); ?>
				</section>

			</aside>
		</div>
	</header>

	<!-- Load JS -->
	<?= script_tag('assets/js/anpanel/app.js') ?>
	<?= script_tag('assets/js/plugins/iCheck//icheck.min.js') ?>
</body>
</html>