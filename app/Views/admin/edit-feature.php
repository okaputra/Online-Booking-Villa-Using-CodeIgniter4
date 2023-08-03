<?= $this->extend('layout/template-admin'); ?>
<?= $this->section('content'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Form Update Feature</h1>
<form method="post" action="/admin-post-update-feature/<?php echo $feature['id']; ?>" enctype="multipart/form-data">
    <?= csrf_field(); ?>
  <div class="form-group">
    <label for="exampleFormControlInput1">Features Name</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" name="features_name" value="<?php echo $feature['features_name']; ?>">
  </div>
  <div class="form-group">
    <input type="hidden" class="form-control" id="exampleFormControlInput1" name="id_villa" value="<?php echo $feature['id_villa']; ?>">
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>

</div>
<!-- /.container-fluid -->

<?= $this->endSection(); ?>