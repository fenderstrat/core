<!-- Error Message -->
<?php if($this->session->flashdata('login_failed')) : ?>
<div class="callout callout-danger">
    <h4>
        <p><?= $this->session->flashdata('login_failed') ?></p>
    </h4>
</div>
<?php endif ?>

<!-- Jika validasi gagal -->
<?php if($this->session->flashdata('validation')) : ?>
<div class="alert alert-danger alert-dismissable">
    <i class="fa fa-ban"></i>
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <?= $this->session->flashdata('validation') ?>
</div>
<?php endif ?>


<!-- Jika data berhasil disimpan -->
<?php if($this->session->flashdata('success')) : ?>
<div class="alert alert-success alert-dismissable">
    <i class="fa fa-check"></i>
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <?= $this->session->flashdata('success') ?>
</div>
<?php endif ?>

<!-- Jika data gagal disimpan -->
<?php if($this->session->flashdata('fail')) : ?>
<div class="alert alert-danger alert-dismissable">
    <i class="fa fa-ban"></i>
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <?= $this->session->flashdata('fail') ?>
</div>
<?php endif ?>

<!-- Jika upload gagal -->
<?php if($this->session->flashdata('upload_error')) : ?>
<div class="alert alert-danger alert-dismissable">
    <i class="fa fa-ban"></i>
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <?= $this->session->flashdata('upload_error') ?>
</div>
<?php endif ?>
<!-- Jika image ada yang tidak di isi -->
<?php if($this->session->flashdata('dataImage')) : ?>
<div class="alert alert-danger alert-dismissable">
    <i class="fa fa-ban"></i>
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <?= $this->session->flashdata('dataImage') ?>
</div>
<?php endif ?>