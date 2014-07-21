<div class="row">
	<div class="col-xs-12">
		<div class="box box-danger">
			<div class="box-header">
				<h3 class="box-title">Daftar Kotak Sampah Artikel</h3>                                    
			</div>
			<div class="box-body table-responsive">
				<?php if($artikel === null) : ?>
					<div class="alert alert-warning alert-dismissable">
						<i class="fa fa-ban"></i>
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<b>Alert!</b> Data belum ada !
					</div>
				<?php else : ?>
				
				<!-- load pesan -->
                <?= $this->load->view('admin/layout/message'); ?>
			<table id="example1" class="table table-bordered table-hover">
				<thead>
					<tr>
						<th>No</th>
                        <th>Judul Artikel</th>
                        <th>Kategori</th>
                        <th>Tags</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php $i = 1 ?>
					<?php foreach ($artikel as $row):  ?>
						<tr>
							<td>
								<?= $i ?>
							</td>
							<td width="20%">
								<?= character_limiter($row->judul, 1000) ?>
							</td>
							<td width="15%">
								<?php foreach (${'artikel_kategori'.$i} as $kategori_row):  ?>
										<i> <?= $kategori_row->kategori ?>, </i>
								<?php endforeach ?>
							</td>
							<td>
								<?=  character_limiter($row->tag, 10) ?>
							</td>
							<td>
								<?= $row->tanggal ?>
								<br>
								<?= $row->status ?>
							</td>
							<td>
								<?= anchor(base_url('admin/artikel/edit/'.$row->artikel_id.'/'.url_title($row->judul)), 'Edit', array('title' => 'Edit', 'class'=>'btn btn-sm btn-primary')); ?>
								<?= anchor(base_url('admin/artikel/detail/'.$row->artikel_id.'/'.url_title($row->judul)), 'Lihat', array('title' => 'Lihat', 'class'=>'btn btn-sm btn-success')); ?>
								<?= anchor(base_url('admin/artikel/publish/'.$row->artikel_id.'/'.url_title($row->judul)), 'Publish', array('title' => 'Terbitkan ', 'class'=>'btn btn-sm btn-info')); ?>
								<?= anchor(base_url('admin/artikel/delete/'.$row->artikel_id.'/'.url_title($row->judul)), 'Hapus', array('title' => 'Hapus Permanen Data', 'class'=>'btn btn-sm btn-danger', 'onclick' =>'return pesan()')); ?>
							</td>
						</tr>
					<?php $i++; ?>
					<?php endforeach ?>
				</tbody>
			</table>
	<?php endif ?>
</div>
</div>

</div>
</div>

<?= link_tag('assets/css/datatables/dataTables.bootstrap.css') ?>
<?= script_tag('assets/js/plugins/datatables/jquery.dataTables.js') ?>
<?= script_tag('assets/js/plugins/datatables/dataTables.bootstrap.js') ?>

<!-- page script -->
<script type="text/javascript">
	$(function() {
		$('#artikel').dataTable({
			"bPaginate": true,
			"bLengthChange": false,
			"bFilter": false,
			"bSort": true,
			"bInfo": true,
			"bAutoWidth": false
		});
	});
	 $("#example1").dataTable({
                    "aoColumns": [
                  null,
                  null, null,null, null,
                  { "bSortable": false }
                ] } );
</script>
<script type="text/javascript">
    function pesan() {
       var answer = confirm("Apakah Anda yakin untuk menghapus permanen data ini?");
       if (answer) {
          return true;
      }

      return false;
  }
</script>