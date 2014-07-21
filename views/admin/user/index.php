<div class="row">
    <div class="col-md-6">
	    <!-- general form FOR ADD -->

	  <?php if ($this->uri->segment(3) === 'edit'): ?>
	    <div class="box box-primary">
	        <div class="box-header">
	            <h3 class="box-title">Edit User <?= $user_single->username; ?></h3>
	        </div><!-- /.box-header -->
	        <!-- form start -->
	        	<?= form_open_multipart(base_url('admin/user/update')) ?>
	        	<input type="hidden" name="user" value="<?= $user_single->username; ?>">
	            <div class="box-body">
	            	<?= $this->load->view('admin/layout/message'); ?>
	                <div class="form-group">
	                    <label for="nama">Username</label>
	                    <input type="text" class="form-control" name="username" value="<?= $user_single->username; ?>" id="nama" placeholder="Masukan Username">
	                </div>
	                <div class="form-group">
	                    <label for="lengkap">Nama Lengkap</label>
	                    <input type="text" class="form-control" name="nama" value="<?= $user_single->nama; ?>" id="lengkap" placeholder="Masukan Nama Lengkap Untuk Username">
	                </div>
	                <div class="form-group">
	                    <label for="email">Email</label>
	                    <input type="email" class="form-control" name="email" value="<?= $user_single->email; ?>" id="email" placeholder="Masukan Email">
	                </div>
	                <div class="form-group">
	                    <label for="exampleInputPassword1">Password</label>
	                    <input type="password" class="form-control" name="password" value="<?= $this->session->flashdata('password');  ?>" id="exampleInputPassword1" placeholder="Password">
	                </div>
	                <div class="form-group">
	                    <label for="exampleInputPassword2"> Konfirmasi Password</label>
	                    <input type="password" class="form-control" name="conf" value="<?= $this->session->flashdata('conf');  ?>" id="exampleInputPassword2" placeholder="Password">
	                </div>
	                <div class="form-group">
	                    <div class="row">
	                        <div class="col-xs-5">
	                           <label>Level User</label>
	                            <select name="level" class="form-control">
	                                <option>Pilih Level</option>
	                               	<option <?php if( $user_single->level == '1') { echo 'selected="selected"'; } ?> value="1">Super User</option>
	                               	<option <?php if( $user_single->level == '2') { echo 'selected="selected"'; } ?> value="2">Author</option>
	                            </select>
	                        </div>
	                    </div>
	                </div>
	                <div class="form-group">
	                    <label for="exampleInputFile">Photo</label>
	                    <input type="file" name="photo" id="exampleInputFile">
	                    <input type="hidden" name="images" value="<?= $user_single->photo; ?>">
	                    <p class="help-block">
	                    	Pilih File Jika Ingin Mengganti Photo
	                    	<br>
	                    	File Harus Bertipe PNG/JPEG/GIF Max Ukuran 200kb</p>
	                </div>
	            </div><!-- /.box-body -->

	            <div class="box-footer">
	                <button type="submit" class="btn btn-success">Simpan</button>
	            </div>
	        	<?= form_close(); ?>
	    </div><!-- /.box -->

	<?php else: ?>

		<div class="box box-primary">
	        <div class="box-header">
	            <h3 class="box-title">Tambah User</h3>
	        </div><!-- /.box-header -->
	        <!-- form start -->
	        	<?= form_open_multipart(base_url('admin/user/save')) ?>
	            <div class="box-body">
	            	<?= $this->load->view('admin/layout/message'); ?>
	                <div class="form-group">
	                    <label for="nama">Username</label>
	                    <input type="text" class="form-control" name="username" value="<?= $this->session->flashdata('username');  ?>" id="nama" placeholder="Masukan Username">
	                </div>
	                <div class="form-group">
	                    <label for="lengkap">Nama Lengkap</label>
	                    <input type="text" class="form-control" name="nama" value="<?= $this->session->flashdata('nama');  ?>" id="lengkap" placeholder="Masukan Nama Lengkap Untuk Username">
	                </div>
	                <div class="form-group">
	                    <label for="email">Email</label>
	                    <input type="email" class="form-control" name="email" value="<?= $this->session->flashdata('email');  ?>" id="email" placeholder="Masukan Email">
	                </div>
	                <div class="form-group">
	                    <label for="exampleInputPassword1">Password</label>
	                    <input type="password" class="form-control" name="password" value="<?= $this->session->flashdata('password');  ?>" id="exampleInputPassword1" placeholder="Password">
	                </div>
	                <div class="form-group">
	                    <label for="exampleInputPassword2"> Konfirmasi Password</label>
	                    <input type="password" class="form-control" name="conf" value="<?= $this->session->flashdata('conf');  ?>" id="exampleInputPassword2" placeholder="Password">
	                </div>
	                <div class="form-group">
	                    <div class="row">
	                        <div class="col-xs-5">
	                           <label>Level User</label>
	                            <select name="level" class="form-control">
	                                <option>Pilih Level</option>
	                               	<option <?php if($this->session->flashdata('parent') == '1') { echo 'selected="selected"'; } ?> value="1">Super User</option>
	                               	<option <?php if($this->session->flashdata('parent') == '2') { echo 'selected="selected"'; } ?> value="2">Author</option>
	                            </select>
	                        </div>
	                    </div>
	                </div>
	                <div class="form-group">
	                    <label for="exampleInputFile">Photo</label>
	                    <input type="file" name="photo" id="exampleInputFile">
	                    <p class="help-block">File Harus Bertipe PNG/JPEG/GIF Max Ukuran 200kb</p>
	                </div>
	            </div><!-- /.box-body -->

	            <div class="box-footer">
	                <button type="submit" class="btn btn-primary">Tambah</button>
	            </div>
	        	<?= form_close(); ?>
	    </div><!-- /.box -->

	<?php endif ?>

	</div>
	<div class="col-md-6">
	    <!-- general form elements -->
	    <div class="box box-success">
	    	
	        <div class="box-header">
	            <h3 class="box-title">Data User</h3>
	        </div>
	        <div class="box-body">
	        	 <?php if($user === null) : ?>
					<div class="alert alert-warning alert-dismissable">
						<i class="fa fa-ban"></i>
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<b>Alert!</b> Belum Ada User Selain Anda !
					</div>
				<?php else : ?>
	            <table class="table table-striped">
	                <tbody>
	                <tr>
	                    <th style="width: 10px">No</th>
	                    <th>Photo</th>
	                    <th>Username</th>
	                    <th>Level</th>
	                    <th>Action</th>
	                </tr>
	                
                	<?php $i = 1; ?>
                	<?php foreach ($user as $row): ?>
	                	<tr>
	                		<td><?= $i ?>.</td>
		                    <td class="user-panel">
		                        <div class="pull-left image">
		                            <img src="<?= base_url('assets/uploads/'.$row->photo) ?>" class="img-circle" alt="User Photo">
		                        </div>
		                    </td>
		                    <td><?= $row->username; ?></td>
		                    <?php if ($row->level == 1): ?>
		                    	<td>Super Admin</td>
		                    <?php else: ?>
		                    	<td>Author</td>
		                    <?php endif ?>
		                    <td>
		                        <div class="box-tools">
		                            <a href="<?= base_url('admin/user/edit/'.$row->username) ?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a>
		                            <a href="<?= base_url('admin/user/delete/'.$row->username) ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash-o" onclick="return pesan()"></i></a>
		                        </div>
		                    </td>
		                </tr>
	                <?php $i++; endforeach ?>
	                
	            	</tbody>
	        	</table>
	       		<?php endif ?>
	        </div><!-- /.box-body -->
	    </div><!-- /.box -->
	</div>
</div>
<script type="text/javascript">
    function pesan() {
       var answer = confirm("Apakah Anda yakin untuk menghapus data ini?");
       if (answer) {
          return true;
      }

      return false;
  }
</script>