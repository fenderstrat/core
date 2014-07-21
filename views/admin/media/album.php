<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title"><?php echo $title ?></h3>
            </div><!-- /.box-header -->

            <div class="row padding-10">
                 <!-- load pesan -->
                    <?= $this->load->view('admin/layout/message'); ?>

                <div class="col-md-5">
                   <?php echo form_open('admin/album/save/'); ?>
                   <div class="input-group">
                        <input type="text" class="form-control" name="judul" value="<?= $this->session->flashdata('judul');  ?>" placeholder="Judul Album">
                        <span class="input-group-btn">
                            <button class="btn btn-success" type="submit">Tambah Album</button>
                        </span>
                    </div>
                    <?php echo form_close(); ?>
                </div>
                <div class="col-md-3 pull-right">
                   <!--  <form class="align-right">
                        <div class="btn-group">
                        <select class="form-control">
                            <option>-- Select Month --</option>
                            <option>January</option>
                            <option>February</option>
                            <option>March</option>
                            <option>May</option>
                        </select>
                        </div>
                        <div class="btn-group">
                        <input class="btn btn-primary" type="submit" value="Filter">
                        </div>
                    </form>   -->
                </div>
            </div>
            <hr>
            <div class="box-body">
                <div class="row">
                    <?php if ($album !== null): ?>
                        <?php foreach ($album as $newAlbum): ?>
                            <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12">
                                <div class="gallery-box">
                                    <div class="gallery-thumbnail">
                                        <?php if ($newAlbum->image != ''): ?>
                                            <a target="_blank" href="<?php echo base_url('admin/album/edit/'.$newAlbum->album_id.'/'.url_title($newAlbum->judul)) ?>"><img src="<?php echo base_url('assets/uploads/'.$newAlbum->image) ?>"></a>
                                        <?php else: ?>
                                            <a target="_blank" href="<?php echo base_url('admin/album/edit/'.$newAlbum->album_id.'/'.url_title($newAlbum->judul)) ?>"><img src="<?php echo base_url('assets/uploads/no_image_galeri.jpg') ?>"></a>
                                        <?php endif ?>
                                    </div>
                                    <div class="gallery-detail">
                                        <div class="row">
                                            <div class="title">
                                                <a target="_blank" href="<?php echo base_url('admin/album/edit/'.$newAlbum->album_id.'/'.url_title($newAlbum->judul)) ?>"><?php echo $newAlbum->judul ?></a>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 col-lg-6 col-sm-6 col-xs-6">
                                                <a class="btn btn-danger" href="<?php echo base_url('admin/album/delete/'.$newAlbum->album_id.'/'.url_title($newAlbum->judul)) ?>" title="Delete" onclick="return pesan()">Hapus Album</a>
                                            </div>
                                            <div class="col-md-6 col-lg-6 col-sm-6 col-xs-6">
                                                <a class="btn btn-primary pull-right" target="_blank" href="<?php echo base_url('admin/album/edit/'.$newAlbum->album_id.'/'.url_title($newAlbum->judul)) ?>" title="Manage Album">Manage Album</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        <?php endforeach ?>
                    <?php endif ?>
                    
                </div>  

                <div class="row padding-10">
                    <div class="box-footer">
                        <div class="pull-right">
                                <?php echo $this->pagination->create_links(); ?>
                        </div>
                    </div>
                </div>                                
            </div><!-- /.box-body -->
        </div>
    </div>
</div>
<script type="text/javascript">
    function pesan() {
       var answer = confirm("Apakah Anda yakin untuk menghapus Album Dan seluruh galeri didalamnya?");
       if (answer) {
          return true;
      }

      return false;
  }
</script>