<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title">Daftar Halaman</h3>
				<div class="pull-right box-tools">
					<a href="<?= base_url('admin/halaman/add') ?>" class="btn btn-sm btn-primary text-white"><span class="glyphicon glyphicon-pencil"></span> Buat Baru </a>
					<a href="<?= base_url('admin/halaman/kotak_sampah') ?>" class="btn btn-sm btn-danger text-white">
						<span class="glyphicon glyphicon-trash"></span> 
						Kotak Sampah
						<?php if ($jumlahRowSampah !== 0): ?>
							<span class="label label-danger"><?= $jumlahRowSampah ?></span>
						<?php endif ?>
					</a>
				</div>                                  
			</div>
			<div class="box-body table-responsive">
				<?php if($halaman === null) : ?>
					<div class="alert alert-warning alert-dismissable">
						<i class="fa fa-ban"></i>
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<b>Maaf</b> Data belum ada !
					</div>
				<?php else : ?>
				
				<!-- load pesan -->
                <?= $this->load->view('admin/layout/message'); ?>
			<table id="example1" class="table table-bordered table-hover">
				<thead>
					<tr>
						<th>No</th>
                        <th>Judul halaman</th>
                        <th>Tags</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php $i = 1 ?>
					<?php foreach ($halaman as $row):  ?>
						<tr>
							<td width="5%">
								<?= $i ?>
							</td>
							<td width="40%">
								<?= character_limiter($row->judul, 1000) ?>
							</td>
							<td width="30%">
								<?=  character_limiter($row->tag, 10) ?>
							</td>
							<td width="10%">
								<?php 
	                                $string = $row->tanggal;
	                                $dt = explode("-", $string);
	                                $a = explode(" ", $dt[2]);
	                                $tgl = $a[0].'/'.$dt[1].'/'.$dt[0].' '.$a[1];
	                             ?>
								<?= $tgl ?>
								<br>
								<?= $row->status ?>
							</td>
							<td class="15%">
								<?= anchor(base_url('admin/halaman/edit/'.$row->halaman_id.'/'.url_title($row->judul)), '<i class="fa fa-edit"></i>', array('title' => 'Edit', 'class'=>'btn btn-sm btn-primary')); ?>
								<?= anchor(base_url('halaman/index/'.$row->halaman_id.'/'.url_title($row->judul)), '<i class="fa fa-external-link"></i>', array('title' => 'Lihat', 'class'=>'btn btn-sm btn-success','target'=>'_blank')); ?>
								<?php if($row->status == 'publish') :?>
									<?= anchor(base_url('admin/halaman/draft/'.$row->halaman_id.'/'.url_title($row->judul)), '<i class="fa fa-save"></i>', array('title' => 'Draft', 'class'=>'btn btn-sm btn-warning')); ?>
								<?php else : ?>
									<?= anchor(base_url('admin/halaman/publish/'.$row->halaman_id.'/'.url_title($row->judul)), '<i class="fa fa-paper-plane"></i>', array('title' => 'Terbitkan', 'class'=>'btn btn-sm btn-info')); ?>
								<?php endif ?>
								<?= anchor(base_url('admin/halaman/trash/'.$row->halaman_id.'/'.url_title($row->judul)), '<i class="fa fa-trash-o"></i>', array('title' => 'Masukan Ke Kotak Sampah', 'class'=>'btn btn-sm btn-danger', 'onclick' =>'return pesan()')); ?>
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
		$('#halaman').dataTable({
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
                  null,null,null, null,
                  { "bSortable": false }
                ] } );
</script>
<script type="text/javascript">
    function pesan() {
       var answer = confirm("Apakah Anda yakin untuk memindah record ke kotak sampah?");
       if (answer) {
          return true;
      }

      return false;
  }
</script>