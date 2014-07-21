  <!-- Left side column. contains the logo and sidebar -->
  <aside class="left-side sidebar-offcanvas">
  	<!-- sidebar: style can be found in sidebar.less -->
  	<section class="sidebar">
  		<!-- Sidebar user panel -->
  		<div class="user-panel">
  			<div class="pull-left image">
  				<?= img(array('src'=>base_url('assets/uploads/'.$this->session->userdata('photo')), 'alt'=>'User Image', 'class'=>'img-circle')) ?>
  			</div>
  			<div class="pull-left info">
  				<p>Hello, <?= $this->session->userdata('admin') ?></p>
  			</div>
  			<!-- <div class="pull-left">
  				<p style="font-size: 12px;"><small>Ini Adalah <span class="text-info">aNPanel v1.0</span> Terimakasih Atas Kepercayaan Yang Telah Anda Berikan</small></p>
  			</div> -->
  		</div>
  		<!-- search form -->
  		<!-- <form action="#" method="get" class="sidebar-form">
  			<div class="input-group">
  				<input type="text" name="q" class="form-control" placeholder="Search..."/>
  				<span class="input-group-btn">
  					<button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
  				</span>
  			</div>
  		</form> -->
  		<!-- /.search form -->
  		<?php if ($this->session->userdata('level') == '1'): ?>
        <ul class="sidebar-menu">
          <li class="<?php if($parentMenu == 'dashboard'){ echo 'activenew active'; } ?>">
            <?= anchor(base_url('admin/'), '<span><i class="fa fa-dashboard"></i> Dashboard</span>', array('title' => 'Dashboard')); ?>
          </li>
          <li class="treeview <?php if($parentMenu == 'artikel'){ echo 'activenew active'; } ?>">
            <?= anchor('#', '<span><i class="fa fa-list"></i> Artikel </span> <i class="fa fa-angle-left pull-right"></i>', array('title' => 'Artikel')); ?>
            <ul class="treeview-menu">
              <li <?php if($childMenu == 'index'){ echo 'class="active"'; } ?>><?= anchor(base_url('admin/artikel'), '<i class="fa fa-angle-double-right"></i> Data Artikel', array('title' => 'Data Artikel')); ?></li>
              <li <?php if($childMenu == 'add'){ echo 'class="active"'; } ?>><?= anchor(base_url('admin/artikel/add'), '<i class="fa fa-angle-double-right"></i> Buat Baru', array('title' => 'Buat Baru')); ?></li>
              <li <?php if($childMenu == 'kategori'){ echo 'class="active"'; } ?>><?= anchor(base_url('admin/kategori'), '<i class="fa fa-angle-double-right"></i> Kategori', array('title' => 'Kategori')); ?></li>
            </ul>
          </li>

          <li class="treeview <?php if($parentMenu == 'halaman'){ echo 'activenew active'; } ?>">
            <?= anchor('#', '<span><i class="fa fa-copy"></i> Halaman </span> <i class="fa fa-angle-left pull-right"></i>', array('title' => 'Halaman')); ?>
            <ul class="treeview-menu" style="display: none;">
                <li <?php if($childMenu == 'index'){ echo 'class="active"'; } ?>><?= anchor(base_url('admin/halaman'), '<i class="fa fa-angle-double-right"></i> Data Halaman', array('title' => 'Data Halaman')); ?></li>
                <li <?php if($childMenu == 'add'){ echo 'class="active"'; } ?>><?= anchor(base_url('admin/halaman/add'), '<i class="fa fa-angle-double-right"></i> Buat Baru', array('title' => 'Buat Baru')); ?></li>
            </ul>
          </li>
         <li class="<?php if($parentMenu == 'media'){ echo 'activenew active'; } ?>">
            <?= anchor(base_url('admin/album'), '<span><i class="fa fa-picture-o"></i> Media</span>', array('title' => 'Dashboard')); ?>
          </li>
          <li <?php if($parentMenu == 'user'){ echo "class='activenew active'"; } ?>>
            <?= anchor(base_url('admin/user'), '<span><i class="fa fa-user"></i> User</span>', array('title' => 'User')); ?>
          </li>
          <li class="treeview <?php if($parentMenu == 'pengaturan'){ echo 'activenew active'; } ?>">
            <?= anchor('#', '<span><i class="fa fa-cogs"></i> Pengaturan</span> <i class="fa fa-angle-left pull-right"></i>', array('title' => 'Pengaturan')); ?>
            <ul class="treeview-menu" style="display: none;">
                <li <?php if($childMenu == 'menu'){ echo 'class="active"'; } ?>><?= anchor(base_url('admin/menu/'), '<i class="fa fa-angle-double-right"></i> Menu', array('title' => 'Pengaturan Menu')); ?></li>
                 <li <?php if($childMenu == 'logo'){ echo 'class="active"'; } ?>><?= anchor(base_url('admin/setting/logo'), '<i class="fa fa-angle-double-right"></i> Logo', array('title' => 'Pengaturan Halaman logo')); ?></li>
                 <li <?php if($childMenu == 'favicon'){ echo 'class="active"'; } ?>><?= anchor(base_url('admin/setting/favicon'), '<i class="fa fa-angle-double-right"></i> Favicon', array('title' => 'Pengaturan Halaman favicon')); ?></li>
                 <li <?php if($childMenu == 'banner'){ echo 'class="active"'; } ?>><?= anchor(base_url('admin/setting/banner'), '<i class="fa fa-angle-double-right"></i> Banner', array('title' => 'Pengaturan Halaman banner')); ?></li>
                 <li <?php if($childMenu == 'widget'){ echo 'class="active"'; } ?>><?= anchor(base_url('admin/widget/'), '<i class="fa fa-angle-double-right"></i> Widget', array('title' => 'Pengaturan Widget')); ?></li>
                 <li <?php if($childMenu == 'seo'){ echo 'class="active"'; } ?>><?= anchor(base_url('admin/setting/seo'), '<i class="fa fa-angle-double-right"></i> SEO', array('title' => 'Pengaturan Halaman SEO')); ?></li>
                 <li <?php if($childMenu == 'kontak'){ echo 'class="active"'; } ?>><?= anchor(base_url('admin/kontak/'), '<i class="fa fa-angle-double-right"></i> Kontak', array('title' => 'Pengaturan Halaman Kontak')); ?></li>
            </ul>
          </li>
        </ul>
      <?php else: ?>
        <ul class="sidebar-menu">
          <li class="<?php if($parentMenu == 'dashboard'){ echo 'activenew active'; } ?>">
            <?= anchor(base_url('admin/'), '<span><i class="fa fa-dashboard"></i> Dashboard</span>', array('title' => 'Dashboard')); ?>
          </li>
          <li class="treeview <?php if($parentMenu == 'artikel'){ echo 'activenew active'; } ?>">
            <?= anchor('#', '<span><i class="fa fa-list"></i> Artikel </span> <i class="fa fa-angle-left pull-right"></i>', array('title' => 'Artikel')); ?>
            <ul class="treeview-menu">
              <li <?php if($childMenu == 'add'){ echo 'class="active"'; } ?>><?= anchor(base_url('admin/artikel/add'), '<i class="fa fa-angle-double-right"></i> Buat Baru', array('title' => 'Buat Baru')); ?></li>
              <li <?php if($childMenu == 'index'){ echo 'class="active"'; } ?>><?= anchor(base_url('admin/artikel'), '<i class="fa fa-angle-double-right"></i> Data Artikel', array('title' => 'Data Artikel')); ?></li>
              <li <?php if($childMenu == 'kategori'){ echo 'class="active"'; } ?>><?= anchor(base_url('admin/kategori'), '<i class="fa fa-angle-double-right"></i> Kategori', array('title' => 'Kategori')); ?></li>
            </ul>
          </li>
        </ul>
      <?php endif ?>

  	</section>
  	<!-- /.sidebar -->
  </aside>