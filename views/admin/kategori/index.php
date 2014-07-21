<?php if ($this->uri->segment(3) === 'edit'): ?>
    <?= form_open_multipart(base_url('admin/kategori/update/')) ?>
    <?= form_hidden('id', $kategori_single->kategori_id); ?>
<?php else: ?>
    <?= form_open_multipart(base_url('admin/kategori/save')) ?>
<?php endif ?>
<div class='row'>
    <div class="col-md-4">
        <div class='box box-info'>
            <div class='box-header'>
                <?php if ($this->uri->segment(3) === 'edit'): ?>
                    <h3 class="box-title">Edit Kategori <?= $kategori_single->kategori;  ?></h3>
                <?php else: ?>
                    <h3 class="box-title">Tambah Kategori</h3>
                <?php endif ?>
            </div><!-- /.box-header -->
            <div class="box-body">
                <?= $this->load->view('admin/layout/message'); ?>
                <div class="form-group">
                    <label for="nama">Nama Kategori</label>
                    <?php if ($this->uri->segment(3) === 'edit'): ?>
                        <input value="<?= $kategori_single->kategori;  ?>" type="text" class="form-control" name="kate" id="kate" placeholder="Masukan Nama Kategori">
                    <?php else: ?>
                        <input value="<?= $this->session->flashdata('kate');  ?>" type="text" class="form-control" name="kate" id="kate" placeholder="Masukan Nama Kategori">
                    <?php endif ?>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>
    <?php if ($kategori === null): ?>
        <div class="alert alert-warning alert-dismissable">
            <i class="fa fa-ban"></i>
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <b>Maaf</b> Belum Ada Data!
        </div>
    <?php else: ?>
         <div class='col-md-8'>
            <div class='box box-info'>
                <div class='box-header'>
                     <h3 class="box-title">Data Kategori</h3>
                </div><!-- /.box-header -->
                <div class="box-body clearfix">
                    <?php foreach ($kategori as $row): ?>
                        <span class="badge bg-light-blue">
                            <?= $row->kategori ?>
                            <?= anchor(base_url('admin/kategori/edit/'.$row->kategori_id.'/'.url_title($row->kategori)), '<i class="fa fa-fw fa-edit"></i>', array('title' => 'Edit', 'class'=>'text-white')); ?>
                            <?= anchor(base_url('admin/kategori/delete/'.$row->kategori_id.'/'.url_title($row->kategori)), '<i class="fa fa-fw fa-trash-o"></i>', array('title' => 'Edit', 'class'=>'text-red','onclick' =>'return pesan()')); ?>
                        </span>
                    <?php endforeach ?>
            </div>
            </div><!-- /.box -->
        </div><!-- /.col-->
    <?php endif ?>
</div><!-- ./row -->
</form>
<script type="text/javascript">
    function pesan() {
       var answer = confirm("Apakah Anda yakin untuk menghapus data ini?");
       if (answer) {
          return true;
      }

      return false;
  }
</script>