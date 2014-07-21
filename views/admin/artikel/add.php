<?= form_open_multipart(base_url('admin/artikel/save')) ?>
	<div class='row'>
		<div class='col-md-8'>
			<div class='box box-info'>
				<div class='box-header'>
				</div><!-- /.box-header -->
				<div class='box-body pad'>

                    <!-- load pesan -->
                    <?= $this->load->view('admin/layout/message'); ?>

					<div class="form-group">
						<label for="nama">Judul Artikel</label>
						<input type="text" name="jd" value="<?= $this->session->flashdata('jd');  ?>" class="form-control" id="nama" placeholder="Masukan Judul">
					</div>
					<div class="form-group">
						<textarea id="editor1" name="isi" rows="10" cols="80"><?= $this->session->flashdata('isi');  ?></textarea>
					</div>
					<div class="form-group">
						<label>Deskripsi SEO</label>
						<textarea name="deskripsi" title="Ini Adalah SEO Deskrpisi Untuk Meningkatkan Hasil Pencairan Pada Search Engine. Jika Tidak Membutuhkannya Maka Tinggalkan Kosong Maka Kami Akan Menset Paragraf Pertama Dalam Artikel Anda Sebagai SEO Deskripsinya" class="form-control text-left" rows="3" placeholder="Masukan Deskrpsi SEO."><?= $this->session->flashdata('deskripsi');  ?></textarea>
					</div>
					<div class="form-group">
						<label for="nama">Tags</label>
						<input value="<?= $this->session->flashdata('tag'); ?>" type="text" name="tag" class="form-control" id="nama" placeholder="Masukan Tags Artikel Pisahkan Dengan Koma">
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
									<input placeholder="<?= date('d/m/Y H:i') ?>"  type='text' name="tgl" class="form-control" />
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
				<div class="form-group">
					<label for="exampleInputFile">Fitur Image</label>
					<input type="file" name="ico" id="exampleInputFile">
					<p class="help-block">Pilih File jika ingin Mengganti Icon dan File Harus Bertipe PNG/JPEG/GIF Max Ukuran 200kb</p>
				</div>
				<div class="box-footer">
					<button type="submit" class="btn btn-primary">Simpan</button>
				</div>
			</div>
		</div><!-- /.box -->
		<div class='box box-info'>
			<div class='box-body pad'>
				<div class="form-group clearfix"> 
					<label for="exampleInputFile">Kategori</label>
				</div>

				<!-- loop kategori  -->
				<?php if($kategori === null) : ?>
					<label class="badge bg-red">Kategori belum ada</label>
				<?php else : ?>
					<?php foreach($kategori as $row) : ?>
					<label class="badge bg-blue">
						<input type="checkbox" name="kategori[]" value="<?= $row->kategori_id ?>">
						<i class="icon-only icon-bold bigger-110"></i>
						<?= $row->kategori ?>
					</label>
					<?php endforeach ?>
				<?php endif ?>
			</div>
		</div><!-- /.box -->
	</div><!-- /.col-->
</div><!-- ./row -->
<?php form_close() ?>


<?= script_tag('assets/js/plugins/tinymce/tinymce.min.js') ?>

<?= script_tag('assets/js/custom.js') ?>
<script type="text/javascript">
	urlData = '<?= base_url() ?>assets/fileman/index.html';
</script>
<?= script_tag('assets/js/plugins/momentjs/moment.min.js') ?>
<?= script_tag('assets/js/plugins/bootstrap-datetimepicker/bootstrap-datetimepicker.min.js') ?>

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