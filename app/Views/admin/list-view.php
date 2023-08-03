<?= $this->extend('layout/template-admin'); ?>
<?= $this->section('content'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Item List</h1>

<?= $this->include('layout/content-row'); ?>

<div class="row">
<?php
$no= 1;
foreach ($villa as $row) {
?>
<div class="col-sm-6">
    <br>
    <div class="card">
    <img src="<?= base_url() . "/uploads/data_thumbnail/" . $row['thumbnail']; ?>" alt="img" style="height:310px">
      <div class="card-body">
        <span class="badge badge-pill badge-primary"><?= $row['rooms']; ?> ROOMS</span>
        <span class="badge badge-pill badge-secondary"><?= $row['beds']; ?> BEDS</span>
        <span class="badge badge-pill badge-success"><?= $row['baths']; ?> BATHS</span>
        <span class="badge badge-pill badge-danger"><?= $row['square_feet']; ?> M<sup>2</sup></span>
        <hr>
        <h5 class="card-title"><?= $row['villa_name']; ?></h5>
        <p class="card-text"><?= $row['description']; ?></p>
        <a href="/admin-view-details/<?= $row['id']; ?>" class="btn btn-primary">View Details</a>
        <a href="/admin-edit-villa/<?= $row['id']; ?>" class="btn btn-success">Edit</a>
        <a href="/admin-delete-villa/<?= $row['id']; ?>" class="btn btn-warning">Delete</a>
        <button type="button" class="btn btn-outline-danger"><?= number_to_currency($row['price'], 'IDR', 'en_DB'); ?></button>
      </div>
    </div>
  </div>
<?php
}
?>
</div>

</div>
<!-- /.container-fluid -->

<?= $this->endSection(); ?>