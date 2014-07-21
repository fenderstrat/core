<div class="row">
    <div class="col-md-6">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Edit Favicon</h3>
            </div><!-- /.box-header -->
            <!-- form start -->
                <!-- load pesan -->
            <?= $this->load->view('admin/layout/message'); ?>
            <?php echo form_open_multipart('admin/setting/update_favicon');  ?>
                <div class="box-body">
                    <div class="form-group">
                        <img class="col-md-12" src="<?= $source ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">File input</label>
                        <input type="file" id="exampleInputFile" name="favicon">
                        <?php echo form_hidden('image',$image); ?>
                    </div>
                </div><!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>