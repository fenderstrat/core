
                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-md-7">
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">aN Widget Master</h3>
                                </div><!-- /.box-header -->
                                
                                <?php echo $this->load->view('admin/layout/message'); ?>

                                <div class="box-body">
                                    <div class="row">
                                    
                                    <?php $widget_register = register_widget(); ?>
                                    <br>
                                    <?php foreach ($widget_register as $widget_key => $widget_value) : ?>
                                    
                                        <div class="col-md-6">
                                            <div class="box">
                                         
                                                <div class="box-header">
                                                    <h3 class="box-title"><?php echo $widget_value['name']; ?></h3>
                                                    <div class="box-tools pull-right">
                                                        <button class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse"><i class="fa fa-minus"></i></button>
                                                        <?php echo anchor( base_url( 'admin/widget/add/'. $widget_key ), '<i class="fa fa-plus"></i>', array('data-toggle' => 'tooltip', 'title' => 'Add ' . $widget_value['name'], 'class'=>'btn btn-primary btn-sm') ); ?>
                                                    </div>
                                                </div>
                                        
                                                <div class="box-body" style="display: block;">
                                                    <p><?php echo $widget_value['desc']; ?></p>
                                                </div>
                                        
                                            </div>
                                        </div>
                                    
                                    <?php endforeach; ?>
                                    
                                    </div>
                                </div><!-- /.box-body -->
                            </div>
                        </div>

                        <div class="col-md-5">
                            <!-- Custom Tabs -->
                            <div class="nav-tabs-custom">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#tab_1" data-toggle="tab">Widget 1</a></li>
                                    <li class=""><a href="#tab_2" data-toggle="tab">Widget 2</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab_1">
                                        <?php if( null !== $widget1 ): ?>
                                            <?php foreach ( $widget1 as $widget1_value ) : ?>
                                                <?php $widget_data1 = unserialize( $widget1_value->widget_data ); ?>

                                                <?php foreach ( $widget_register as $widget_key => $widget_value ) : ?>
                                                    <?php if( $widget1_value->widget_name == $widget_key ) : ?>
                                                        
                                                        <div class="box">
                                             
                                                            <div class="box-header">
                                                                <h3 class="box-title"><?php echo $widget_value['name']; ?><?php if( "" != $widget_data1['widget_title'] ) echo ': ' . $widget_data1['widget_title']; ?></h3>
                                                                <div class="box-tools pull-right">
                                                                    <!-- <button class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse"><i class="fa fa-minus"></i></button> -->
                                                                    <?php echo anchor( base_url( 'admin/widget/edit/' . $widget1_value->widget_id . '/' . url_title($widget_data1['widget_title'] )), '<i class="fa fa-pencil-square-o"></i>', array('data-toggle' => 'tooltip', 'title' => 'Edit ' . $widget_value['name'], 'class'=>'btn btn-default btn-sm') ); ?>
                                                                    <?php echo anchor( base_url( 'admin/widget/delete/' . $widget1_value->widget_id . '/' . $widget_key ), '<i class="fa fa-trash-o"></i>', array( 'data-toggle' => 'tooltip', 'title' => 'Delete ' . $widget_value['name'], 'class'=>'btn btn-danger btn-sm', 'onclick' =>'return pesan()' ) ); ?>
                                                                </div>
                                                            </div>
                                                    
                                                        </div>

                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <p>Widget Belum Terisi.</p>
                                        <?php endif; ?>
                                    </div><!-- /.tab-pane -->
                                    <div class="tab-pane" id="tab_2">
                                        <?php if( null !== $widget2 ): ?>
                                            <?php foreach ( $widget2 as $widget2_value ) : ?>
                                                <?php $widget_data2 = unserialize( $widget2_value->widget_data ); ?>

                                                <?php foreach  ($widget_register as $widget_key => $widget_value ) : ?>
                                                    <?php if( $widget2_value->widget_name == $widget_key ) : ?>
                                                        
                                                        <div class="box">
                                             
                                                            <div class="box-header">
                                                                <h3 class="box-title"><?php echo $widget_value['name']; ?><?php if( "" != $widget_data2['widget_title'] ) echo ': ' . $widget_data2['widget_title']; ?></h3>
                                                                <div class="box-tools pull-right">
                                                                    <!-- <button class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse"><i class="fa fa-minus"></i></button> -->
                                                                    <?php echo anchor( base_url( 'admin/widget/edit/' . $widget2_value->widget_id . '/' . url_title($widget_data2['widget_title'] )), '<i class="fa fa-pencil-square-o"></i>', array('data-toggle' => 'tooltip', 'title' => 'Edit ' . $widget_value['name'], 'class'=>'btn btn-default btn-sm') ); ?>
                                                                    <?php echo anchor( base_url( 'admin/widget/delete/' . $widget2_value->widget_id . '/' . $widget_key ), '<i class="fa fa-trash-o"></i>', array( 'data-toggle' => 'tooltip', 'title' => 'Delete ' . $widget_value['name'], 'class'=>'btn btn-danger btn-sm', 'onclick' =>'return pesan()' ) ); ?>
                                                                </div>
                                                            </div>
                                                    
                                                        </div>

                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <p>Widget Belum Terisi.</p>
                                        <?php endif; ?>
                                    </div><!-- /.tab-pane -->
                                </div><!-- /.tab-content -->
                            </div><!-- nav-tabs-custom -->
                        </div>
                    </div>
                </section>
                <?= script_tag('assets/js/plugins/tinymce/tinymce.min.js') ?>
                <?= script_tag('assets/js/custom.js') ?>
                <script type="text/javascript">
                    urlData = '<?= base_url() ?>assets/fileman/index.html';
                </script>

                <script type="text/javascript">
                    function pesan() {
                       var answer = confirm("Apakah Anda yakin untuk menghapus widget ini?");
                       if (answer) {
                          return true;
                      }

                      return false;
                    }
                </script>