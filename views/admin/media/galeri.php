<script src="<?php echo base_url('assets/js/plugins/recopy/recopy.js') ?>"></script>
<script type="text/javascript">
$(function(){
    var removeLink = ' <div class="col-md-2 "><a class="remove btn btn-danger btn-xs" href="#" onclick="$(this).parent().parent().fadeOut(function(){ $(this).remove() }); return false"><i class="fa fa-times"></i></a></div>';
    $('.add').relCopy({ append: removeLink});  
});
</script>
<div class="row">
    <div class="col-md-4">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title"><?php echo $title ?></h3>
            </div><!-- /.box-header -->
            <div class="row padding-10">
                <?php echo form_open_multipart('admin/album/save_galeri/'.$this->uri->segment(4).'/'.$this->uri->segment(5)); ?>
                <div class="col-md-12">
                        <div>
                            <input type="hidden" value="<?php echo $album_single->album_id; ?>" name="idAlbum">
                            <a href="#" class="btn-group add btn btn-primary btn-sm" rel=".clone">Tambah Form</a>
                            <button type="submit" class="btn-group btn btn-success pull-right btn-sm">Simpan Gambar</button>
                        </div>
                        <br>
                        <div class="clone row padding-10">                            
                            <div class="col-md-10 ">
                                <label for="exampleInputFile">Pilih Gambar</label>
                                <input required="required" name="gmbr[]" type="file" id="exampleInputFile">
                                <p></p>
                            
                                <input required="required" name="alt[]" type="text" class="form-control input-sm" placeholder="Caption..">
                            </div>
                        </div>
                        <br>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title"><?php echo $title ?></h3>
            </div><!-- /.box-header -->

            <div class="row padding-10">
                <?= $this->load->view('admin/layout/message'); ?>
                <div class="col-md-6">
                <?php echo form_open('admin/album/update/'); ?>
                   <div class="input-group">
                        <input type="hidden" value="edit" name="status">
                        <input type="hidden" value="<?php echo $album_single->album_id; ?>" name="idAlbum">
                        <input type="text" class="form-control" name="judul" value="<?= $album_single->judul;  ?>" placeholder="Judul Album">
                        <span class="input-group-btn">
                            <button class="btn btn-success" type="submit">Ganti Judul</button>
                        </span>
                    </div>
                    <?php echo form_close(); ?>
                </div>
                <div class="col-md-4 pull-right">
                    <!-- <form class="align-right">
                        <div class="btn-group">
                        <select class="form-control input-sm">
                            <option>-- Select Month --</option>
                            <option>January</option>
                            <option>February</option>
                            <option>March</option>
                            <option>May</option>
                        </select>
                        </div>
                        <div class="btn-group">
                        <input class="btn btn-primary btn-sm" type="submit" value="Filter">
                        </div>
                    </form>   -->
                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    <?php if ($galeri !== null): ?>
                        <?php foreach ($galeri as $newGaleri): ?>
                            <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12">
                                <div class="gallery-box">
                                    <div class="gallery-detail">
                                        <div class="row">
                                            <div class="text-center">
                                                <?php echo $newGaleri->caption; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="gallery-thumbnail">
                                        <img src="<?php echo base_url('assets/uploads/'.$newGaleri->image) ?>">
                                    </div>
                                    <div class="gallery-detail">
                                        <div class="row">
                                            <div class="col-md-9 col-lg-9 col-sm-9 col-xs-9 ">
                                                <input type="text" class="form-control input-sm " name="" value="<?php echo base_url('assets/uploads/'.$newGaleri->image) ?>">
                                            </div>
                                            <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3 pull-left no-padding">
                                                <a onclick="return pesan()" class="btn btn-danger btn-sm" href="<?php echo base_url('admin/album/delete_galeri/'.$newGaleri->galeri_id.'/'.url_title($newGaleri->caption)) ?>" title="Delete"><i class="fa fa-trash-o"></i></a>
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
       var answer = confirm("Apakah Anda yakin untuk menghapus galeri ini?");
       if (answer) {
          return true;
      }

      return false;
  }
</script>