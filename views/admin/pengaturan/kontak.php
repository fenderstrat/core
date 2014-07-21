<div class="row">
    <?php echo form_open('admin/kontak/update/'); ?>
    <div class="col-md-6">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title"><?php echo $title ?></h3> 
            </div><!-- /.box-header -->
            <!-- load pesan -->
            <?= $this->load->view('admin/layout/message'); ?>

            <div class="box-body">
                    <!-- text input -->
                    <div class="form-group">
                        <label></label>
                        <input type="text" class="form-control" name="judul" value="<?php echo $kontak->judul ?>" placeholder="Enter Title Here...">
                    </div>
                    <!-- textarea -->
                    <div class="form-group">
                        <label></label>
                        <textarea id="editor1" class="form-control" name="deskripsi"rows="10" placeholder="Enter Description Here..."><?php echo $kontak->deskripsi ?></textarea>
                    </div> 

                    <div class="form-group input-group">
                        <span class="input-group-addon">@</span>
                        <input type="text" class="form-control" name="email" value="<?php echo $kontak->email ?>" placeholder="Your Email">
                    </div>

                    <div class="form-group input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-phone"></i>
                        </span>
                        <input type="text" class="form-control" name="phone" value="<?php echo $kontak->phone ?>" placeholder="Enter Phone Here...">
                    </div>

                    <div class="box-footer">
                        <input type="submit" class="btn btn-primary" value="Save">
                    </div>
            </div><!-- /.box-body -->
        </div>
    </div>

    <div class="col-md-6">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Map Settings</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <div id="map">
                    <div id="map_canvas"></div>
                </div> 

                <div class="row">
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Latitude</label>
                            <input type="text" class="form-control" name="latitude" value="<?php echo $kontak->latitude ?>" placeholder="Enter ...">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Logitude</label>
                            <input type="text" class="form-control" name="longitude" value="<?php echo $kontak->logitude ?>" placeholder="Enter ...">
                        </div>
                    </div>
                </div>                                   
            </div><!-- /.box-body -->
        </div>
    </div>
<?php echo form_close(); ?>
</div>

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

<!-- maps start -->
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">
    function initialize(){
        var lat = '<?php echo $kontak->latitude ?>';
        var lan = '<?php echo $kontak->logitude ?>';

        var title = '<?php echo str_replace("\n", " ", $kontak->judul); ?>';
        var mapOptions = {
            zoom: 15,
            center: new google.maps.LatLng(lat,lan),
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };

        var map = new google.maps.Map(document.getElementById('map_canvas'), mapOptions);

        var marker = new google.maps.Marker({
            position: new google.maps.LatLng(lat,lan),
            map: map,
            title: title
        });

    }

    google.maps.event.addDomListener(window, 'load', initialize);   
</script>
<style type="text/css">
#map {
    width: 100%;
    height: 250px;
}
#map_canvas {
    height: 100%;
}
</style>
<!-- maps end -->