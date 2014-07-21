<?= form_open_multipart(base_url('admin/halaman/save')) ?>
	<div class='row'>
		<div class='col-md-8'>
			<div class='box box-info'>
				<div class='box-header'>
				</div><!-- /.box-header -->
				<div class='box-body pad'>

                    <!-- load pesan -->
                    <?= $this->load->view('admin/layout/message'); ?>

					<div class="form-group">
						<label for="nama">Judul halaman</label>
						<input type="text" name="jd" value="<?= $this->session->flashdata('jd');  ?>" class="form-control" id="nama" placeholder="Masukan Judul">
					</div>
					<div class="form-group">
						<textarea id="editor1" name="isi" rows="10" cols="80"><?= $this->session->flashdata('isi');  ?></textarea>
					</div>
					<div class="form-group">
						<label>Deskripsi SEO</label>
						<textarea name="deskripsi" title="Ini Adalah SEO Deskrpisi Untuk Meningkatkan Hasil Pencairan Pada Search Engine. Jika Tidak Membutuhkannya Maka Tinggalkan Kosong Maka Kami Akan Menset Paragraf Pertama Dalam halaman Anda Sebagai SEO Deskripsinya" class="form-control text-left" rows="3" placeholder="Masukan Deskrpsi SEO."><?= $this->session->flashdata('deskripsi');  ?></textarea>
					</div>
					<div class="form-group">
						<label for="nama">Tags</label>
						<input value="<?= $this->session->flashdata('tag'); ?>" type="text" name="tag" class="form-control" id="nama" placeholder="Masukan Tags halaman Pisahkan Dengan Koma">
					</div>

				</div>
			</div><!-- /.box -->
		</div><!-- /.col-->
		<div class='col-md-4'>
			<div class='box box-info'>
				<div class='box-header'>
				</div><!-- /.box-header -->
				<div class='box-body pad'>
					<!-- Date and time range -->
					<div class="form-group">
						<label>Tanggal Publish:</label>
						<div id="datetimepicker1" class="input-append date">
							<div class="form-group">
								<div class='col-md-8 input-group date' id='datetimepicker1'>
									<input placeholder="<?= date('d/m/Y H:i:s') ?>"  type='text' name="tgl" class="form-control" />
									<span value="" class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
								</span>
							</div>
						</div>
					</div>
				</div><!-- /.form group -->
				<div class="form-group">
					<label>Status Publish:</label>
					<div class='col-md-8 input-group'>
						<select name="sts" class="form-control">
							<option value="publish">Publish</option>
							<option value="draft">Draft</option>
						</select>
					</div>
				</div>
				<div class="box-footer">
					<button type="submit" class="btn btn-primary">Simpan</button>
				</div>
			</div>
		</div><!-- /.box -->
	</div><!-- /.col-->
</div><!-- ./row -->
<?php form_close() ?>

<?= link_tag('assets/js/plugins/bootstrap-datetimepicker/bootstrap-datetimepicker.min.css') ?>
<?= link_tag('assets/css/iCheck/all.css') ?>
<?= script_tag('assets/js/plugins/tinymce/tinymce.min.js') ?>
<?= script_tag('assets/js/plugins/momentjs/moment.min.js') ?>
<?= script_tag('assets/js/plugins/bootstrap-datetimepicker/bootstrap-datetimepicker.min.js') ?>
<?= script_tag('assets/js/custom.js') ?>
<script type="text/javascript">
	urlData = '<?= base_url() ?>assets/fileman/index.html';
</script>


<script type="text/javascript">
	$(function() {
		$('#datetimepicker1').datetimepicker({
                    //useCurrent: true, 
                    language: 'id',
                    useSeconds: true,  
                });
		$('textarea').tooltip({
			track: true
		});

	});
</script>