<?php
	$this->load->view('template/header');
?>

<!-- conten wrapper -->
<div class="content-wrapper">

	<!-- main wrapper -->
	<div class="main">
<?php
	$this->load->view('template/menu-kiri');
	$this->load->view($content);
?>
	</div>
<?php
	$this->load->view('template/sidebar');
?>
</div>
<?php
	$this->load->view('template/footer');
?>