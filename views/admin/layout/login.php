<!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="UTF-8">
	<title>anPanel | Log in</title>
	<!-- bootstrap 3.0.2 -->
	<?= link_tag('assets/css/bootstrap.min.css') ?>
	<!-- font Awesome -->
	<?= link_tag('assets/css/font-awesome.min.css') ?>
	<!-- Theme style -->
	<?= link_tag('assets/css/anpanel.css') ?>
</head>
<body class="bg-black">
	<div class="form-box" id="login-box">
		
		<!-- load pesan -->
        <?= $this->load->view('admin/layout/message'); ?>

		<div class="header">Sign In</div>
		<?= form_open(base_url('admin/process')) ?>
			<div class="body bg-gray">
				<div class="form-group">
					<input type="text" name="username" class="form-control" placeholder="Username"/>
				</div>
				<div class="form-group">
					<input type="password" name="password" class="form-control" placeholder="Password"/>
				</div> 
			</div>
			<div class="footer">  
				<button type="submit" class="btn bg-olive btn-block">Sign me in</button>
				<a href="<?= base_url(); ?>" class="text-center">Kembali Ke Halaman Utama</a>
			</div>
		<?= form_close() ?>
	</div>

	<!-- jQuery 2.0.2 -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
	<!-- Bootstrap -->
	<?= script_tag('assets/js/bootstrap.min.js') ?>

</body>
</html>