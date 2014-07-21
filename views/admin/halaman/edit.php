<?= form_open_multipart(base_url('admin/halaman/update')) ?>
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
                        <input type="text" name="jd" value="<?= $halaman->judul ?>" class="form-control" id="nama" placeholder="Masukan Judul">
                    </div>
                    <div class="form-group">
                        <textarea id="editor1" name="isi" halamans="10" cols="80"><?= $halaman->isi ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Deskripsi SEO</label>
                        <textarea name="deskripsi" title="Ini Adalah SEO Deskrpisi Untuk Meningkatkan Hasil Pencairan Pada Search Engine. Jika Tidak Membutuhkannya Maka Tinggalkan Kosong Maka Kami Akan Menset Paragraf Pertama Dalam halaman Anda Sebagai SEO Deskripsinya" class="form-control text-left" halamans="3" placeholder="Masukan Deskrpsi SEO."><?= $halaman->deskripsi  ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="nama">Tags</label>
                        <input value="<?= $halaman->tag ?>" type="text" name="tag" class="form-control" id="nama" placeholder="Masukan Tags halaman Pisahkan Dengan Koma">
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
                            <?php 
                                $string = $halaman->tanggal;
                                $dt = explode("-", $string);
                                $a = explode(" ", $dt[2]);
                                $tgl = $a[0].'/'.$dt[1].'/'.$dt[0].' '.$a[1];
                             ?>
                            <div class="form-group">
                                <div class='col-md-8 input-group date' id='datetimepicker1'>
                                    <input placeholder="<?= date('Y/m/d H:i') ?>" value="<?= $tgl ?>"  type='text' name="tgl" class="form-control" />
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
                            <?php if($halaman->status === 'draft')  : ?>
                                <option value="publish">Publish</option>
                                <option value="draft" selected>Draft</option>
                            <?php else : ?>
                                <option value="publish" selected>Publish</option>
                                <option value="draft">Draft</option>
                            <?php endif ?>
                        </select>
                    </div>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
            <?= form_hidden('id', $halaman->halaman_id); ?>
        </div><!-- /.box -->
    </div><!-- /.col-->
</div><!-- ./halaman -->
<?php form_close() ?>

<?= link_tag('assets/js/plugins/bootstrap-datetimepicker/bootstrap-datetimepicker.min.css') ?>
<?= link_tag('assets/css/iCheck/all.css') ?>
<?= script_tag('assets/js/plugins/tinymce/tinymce.min.js') ?>
<?= script_tag('assets/js/plugins/momentjs/moment.min.js') ?>
<?= script_tag('assets/js/plugins/bootstrap-datetimepicker/bootstrap-datetimepicker.min.js') ?>

<script type="text/javascript">
	var urlData = '<?= base_url() ?>assets/fileman/index.html';
</script>
<?= script_tag('assets/js/custom.js') ?>

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
<script type="text/javascript">
    function pesan() {
       var answer = confirm("Apakah Anda yakin untuk menghapus?");
       if (answer) {
          return true;
      }

      return false;
  }
</script>