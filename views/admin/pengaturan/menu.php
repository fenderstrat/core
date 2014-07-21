<div class='row'>
    <div class="col-md-4">
        <div class='box box-info'>
            <div class='box-header'>
                <?php if ($this->uri->segment(3) === 'edit'): ?>
                    <h3 class="box-title">Edit Menu <?= $menu_single->name;  ?></h3>
                <?php else: ?>
                    <h3 class="box-title">Tambah Menu</h3>
                <?php endif ?>
            </div><!-- /.box-header -->
            <?php if ($this->uri->segment(3) === 'edit'): ?>
                <?= form_open_multipart(base_url('admin/menu/update/')) ?>
                <?= form_hidden('id', $menu_single->id); ?>
            <?php else: ?>
                <?= form_open_multipart(base_url('admin/menu/save')) ?>
            <?php endif ?>
            <div class="box-body">
                <?= $this->load->view('admin/layout/message'); ?>
                <div class="form-group">
                    <label for="nama">Nama Menu</label>
                    <?php if ($this->uri->segment(3) === 'edit'): ?>
                        <input value="<?= $menu_single->name;  ?>" type="text" class="form-control" name="menu" id="menu" placeholder="Masukan Nama Menu">
                    <?php else: ?>
                        <input value="<?= $this->session->flashdata('menu');  ?>" type="text" class="form-control" name="menu" id="menu" placeholder="Masukan Nama Menu">
                    <?php endif ?>
                </div>
               <div class="form-group">
                    <div class="row">
                        <div class="col-xs-10">
                           <label>Parent Menu</label>
                            <select name="parent" class="form-control">
                                <option value="0">Tanpa Parent</option>
                                <?php if ($parent != null): ?>
                                    <?php foreach ($parent as $rowParent): ?>
                                        <?php if ($this->uri->segment(3) === 'edit'): ?>
                                            <option <?php if($menu_single->parent_id == $rowParent->id) { echo 'selected="selected"'; } ?> value="<?= $rowParent->id ?>"><?= ucwords($rowParent->name) ?></option>
                                        <?php else: ?>
                                            <option <?php if($this->session->flashdata('parent') == $rowParent->id) { echo 'selected="selected"'; } ?> value="<?= $rowParent->id ?>"><?= ucwords($rowParent->name) ?></option>
                                        <?php endif ?>
                                    <?php endforeach ?>
                                <?php endif ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="nama">Link</label>
                    <?php if ($this->uri->segment(3) === 'edit'): ?>
                        <input value="<?= $menu_single->link;  ?>" type="text" class="form-control" name="link" id="link" placeholder="contoh:http://namadomaain.com">
                    <?php else: ?>
                        <input value="<?= $this->session->flashdata('link');  ?>" type="text" class="form-control" name="link" id="link" placeholder="contoh:http://namadomaain.com">
                    <?php endif ?>
                </div>
                <div class="box-footer">
                    <?php if ($this->uri->segment(3) === 'edit'): ?>
                        <button type="submit" class="btn btn-success">Simpan</button>
                    <?php else: ?>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    <?php endif ?>
                </div>
            </div>
            <?= form_close(); ?>
        </div>
        <!-- <div class='box box-info'>
            <div class='box-header'>
                <h3 class="box-title">Tambah Menu Dari Halaman</h3>
            </div>
            <div class="box-body">
                <div class="form-group">
                     <label>
                        <input type="checkbox" value="1">
                        <i class="icon-only icon-bold bigger-110"></i>
                        Halaman 1
                    </label>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </div>
        </div>
        <div class='box box-info'>
            <div class='box-header'>
                <h3 class="box-title">Tambah Menu Dari Kategori</h3>
            </div>
            <div class="box-body">
                <div class="form-group">
                     <label>
                        <input type="checkbox" value="1">
                        <i class="icon-only icon-bold bigger-110"></i>
                        Kategori 1
                    </label>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </div>
        </div> -->
    </div>
    <div class='col-md-8'>
        <div class='box box-info'>
            <div class='box-header'>
                 <h3 class="box-title">
                    Tree Menu 
                    <br> 
                    <small>Drag Dan Drop Menu Untuk Mengubah Posisi Menu Sesuai Keinginan</small>
                </h3>
            </div><!-- /.box-header -->
            <div class="box-body clearfix">
                <?= Admin_menu(); ?>
            </div>
        </div><!-- /.box -->
    </div><!-- /.col-->
</div><!-- ./row -->


<!-- NESTABLE -->

<script>
    var getAlamat = "<?= base_url('admin/menu/ajax_save') ?>";
</script>

<?= script_tag('assets/js/plugins/nestable/functions.js') ?>

<?= link_tag('assets/css/nestable/nestable.css') ?>
<?= script_tag('assets/js/plugins/nestable/jquery.nestable.js') ?>


<!-- page script -->
<script type="text/javascript">
    $(function() {

        var updateOutput = function(e)
        {
            var list   = e.length ? e : $(e.target),
                output = list.data('output');
            if (window.JSON) {
                output.val(window.JSON.stringify(list.nestable('serialize')));//, null, 2));
                menu_updatesort(window.JSON.stringify(list.nestable('serialize')));
            } else {
                output.val('JSON browser support required for this demo.');
            }
        };

        // activate Nestable for list 1
        $('#nestableMenu').nestable({
            group: 1
        })
        .on('change', updateOutput);

        // output initial serialised data
        updateOutput($('#nestableMenu').data('output', $('#nestableMenu-output')));

        $('#nestable-menu').on('click', function(e)
        {
            var target = $(e.target),
                action = target.data('action');
            if (action === 'expand-all') {
                $('.dd').nestable('expandAll');
            }
            if (action === 'collapse-all') {
                $('.dd').nestable('collapseAll');
            }
        });

        $('#nestable3').nestable();
    });
</script>
<script>
    function pesan() {
       var answer = confirm("Apakah Anda yakin untuk menghapus data ini?");
       if (answer) {
          return true;
      }

      return false;
  }
</script>