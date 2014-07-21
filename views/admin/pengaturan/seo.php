<div class="row">
    <div class="col-md-6">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title"><?= $title ?></h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <!-- load pesan -->
                <?= $this->load->view('admin/layout/message'); ?>

                <?php echo form_open('admin/setting/update_seo');  ?>
                    <!-- text input -->
                    <div class="form-group">
                        <label></label>
                        <input type="text" name="title" value="<?= $seo->web_title ?>" class="form-control" placeholder="Enter Website Title Here...">
                    </div>
                    <!-- textarea -->
                    <div class="form-group">
                        <label></label>
                        <textarea class="form-control" name="description" rows="10" placeholder="Enter Description Here..."><?= $seo->web_description ?></textarea>
                    </div>

                    <div class="form-group">
                        <label></label>
                        <input type="text" class="form-control" value="<?= $seo->web_keyword ?>" name="keyword" placeholder="Enter Keywords Here...">
                    </div>

                    <div class="box-footer">
                        <input type="submit" class="btn btn-primary" value="Save">
                    </div>

                <?php echo form_close(); ?>
            </div><!-- /.box-body -->
        </div>
    </div>
</div>