<div class="row">
	<div class="col-md-12">
		
		<div class="box box-info">

			<?php echo $this->load->view('admin/layout/message'); ?>

			<?php echo form_open('admin/widget/edit/'); ?>
				<?php echo form_hidden( 'widget_name', $widget_function ); ?>
				
				<div class="box-body">

					<div class="row">
						<div class="col-md-6">
							
							<?php call_user_func( $widget_function . '_form' ); ?>

						</div>
					</div>	
			
				</div>
				<div class="box-footer">
					
					<button type="submit" class="btn btn-primary">Simpan</button>
				
				</div>
			<?php echo form_close(); ?>
		
		</div>

	</div>
</div>

<?= script_tag('assets/js/plugins/tinymce/tinymce.min.js') ?>
<?= script_tag('assets/js/custom.js') ?>
<script type="text/javascript">
    urlData = '<?= base_url() ?>assets/fileman/index.html';
</script>
