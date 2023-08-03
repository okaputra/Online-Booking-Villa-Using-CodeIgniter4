<?= $this->extend('layout/template-admin'); ?>
<?= $this->section('content'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Form Update <b><?php echo $villa['villa_name']; ?></b></h1>
<form method="post" action="/admin-post-update-villa/<?php echo $villa['id']; ?>" enctype="multipart/form-data">
    <?= csrf_field(); ?>
  <div class="form-group">
    <label for="exampleFormControlInput1">Villa's Name</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" name="villa_name" value="<?php echo $villa['villa_name']; ?>" placeholder="e.g Kubu Villa" required>
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Description</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="3" required><?php echo $villa['description']; ?></textarea>
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Number of Rooms</label>
    <input type="number" class="form-control" id="exampleFormControlInput1" name="rooms" value="<?php echo $villa['rooms']; ?>" placeholder="e.g 2" required>
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Number of Beds</label>
    <input type="number" class="form-control" id="exampleFormControlInput1" name="beds" value="<?php echo $villa['beds']; ?>" placeholder="e.g 3" required>
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Number of Baths</label>
    <input type="number" class="form-control" id="exampleFormControlInput1" name="baths" value="<?php echo $villa['baths']; ?>" placeholder="e.g 4" required>
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Square Feet</label>
    <input type="number" class="form-control" id="exampleFormControlInput1" name="square_feet" value="<?php echo $villa['square_feet']; ?>" placeholder="e.g 500" required>
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Price</label>
    <input type="number" class="form-control" id="exampleFormControlInput1" name="price" value="<?php echo $villa['price']; ?>" placeholder="e.g 200000" required>
  </div>
  <div class="form-group">
    <label for="exampleFormControlFile1">Old Thumbnail</label><br>
    <img width="160px" src="<?= base_url() . "/uploads/data_thumbnail/" . $villa['thumbnail']; ?>" alt="" class="img-a img-fluid">
  </div>
  
  <div class="form-group">
    <label for="exampleFormControlFile1">Thumbnail</label>
    <input type="file" class="form-control-file" id="exampleFormControlFile1" name="thumbnail">
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>

</div>
<!-- /.container-fluid -->

<?= $this->endSection(); ?>