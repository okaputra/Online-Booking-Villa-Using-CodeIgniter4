<?= $this->extend('layout/template-admin'); ?>
<?= $this->section('content'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Form Update Content</b></h1>
<form method="post" action="/admin-post-update-content-villa/<?php echo $villaContent['id']; ?>" enctype="multipart/form-data">
    <?= csrf_field(); ?>
  <div class="form-group">
    <label for="exampleFormControlFile1">Old Image 1</label><br>
    <img width="160px" src="<?= base_url() . "/uploads/data_content/" . $villaContent['image_1']; ?>" alt="" class="img-a img-fluid">
  </div>
  <div class="form-group">
    <label for="exampleFormControlFile1">Old Image 2</label><br>
    <img width="160px" src="<?= base_url() . "/uploads/data_content/" . $villaContent['image_2']; ?>" alt="" class="img-a img-fluid">
  </div>
  <div class="form-group">
    <label for="exampleFormControlFile1">Old Image 3</label><br>
    <img width="160px" src="<?= base_url() . "/uploads/data_content/" . $villaContent['image_3']; ?>" alt="" class="img-a img-fluid">
  </div>
  <div class="form-group">
    <label for="exampleFormControlFile1">Old Image 4</label><br>
    <img width="160px" src="<?= base_url() . "/uploads/data_content/" . $villaContent['image_4']; ?>" alt="" class="img-a img-fluid">
  </div>
  <div class="form-group">
    <label for="exampleFormControlFile1">Old Image 5</label><br>
    <img width="160px" src="<?= base_url() . "/uploads/data_content/" . $villaContent['image_5']; ?>" alt="" class="img-a img-fluid">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Maps Link</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" name="link_maps" value="<?php echo $villaContent['link_maps']; ?>">
  </div>
  <div class="form-group">
    <input type="hidden" class="form-control" id="exampleFormControlInput1" name="id_villa" value="<?php echo $villaContent['id_villa']; ?>">
  </div>
  <hr>
  <div class="form-group">
        <label for="exampleFormControlFile1">Image 1</label>
        <input type="file" class="form-control-file" id="exampleFormControlFile1" name="image_1">
    </div>
    <div class="form-group">
        <label for="exampleFormControlFile1">Image 2</label>
        <input type="file" class="form-control-file" id="exampleFormControlFile1" name="image_2">
    </div>
    <div class="form-group">
        <label for="exampleFormControlFile1">Image 3</label>
        <input type="file" class="form-control-file" id="exampleFormControlFile1" name="image_3">
    </div>
    <div class="form-group">
        <label for="exampleFormControlFile1">Image 4</label>
        <input type="file" class="form-control-file" id="exampleFormControlFile1" name="image_4">
    </div>
    <div class="form-group">
        <label for="exampleFormControlFile1">Image 5</label>
        <input type="file" class="form-control-file" id="exampleFormControlFile1" name="image_5">
    </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>

</div>
<!-- /.container-fluid -->

<?= $this->endSection(); ?>