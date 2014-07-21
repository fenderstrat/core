<div class="row">
    <div class="col-md-6">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Edit Logo</h3>
            </div><!-- /.box-header -->
            <!-- form start -->
                <!-- load pesan -->
            <?= $this->load->view('admin/layout/message'); ?>
            <?php echo form_open_multipart('admin/setting/update_logo');  ?>
                <div class="box-body">
                    <div class="form-group">
                        <img class="col-md-12" src="<?= $source ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">File input</label>
                        <input type="file" id="exampleInputFile" name="logo">
                        <?php echo form_hidden('image',$image); ?>
                    </div>
                </div><!-- /.box-body -->

                <div class="box-footer">
                    <input type="submit" class="btn btn-primary" value="Submit">
                </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>