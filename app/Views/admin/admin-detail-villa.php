<?= $this->extend('layout/template-admin'); ?>
<?= $this->section('content'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Detail <i><b><?= $villa['villa_name']; ?></b></i></h1>

<?= $this->include('layout/content-row'); ?>

<div class="row">
<div class="col-sm-6">
    <br>
    <div class="card">
    <img src="<?= base_url() . "/uploads/data_thumbnail/" . $villa['thumbnail']; ?>" alt="img" style="height:310px">
      <div class="card-body">
        <span class="badge badge-pill badge-primary"><?= $villa['rooms']; ?> ROOMS</span>
        <span class="badge badge-pill badge-secondary"><?= $villa['beds']; ?> BEDS</span>
        <span class="badge badge-pill badge-success"><?= $villa['baths']; ?> BATHS</span>
        <span class="badge badge-pill badge-danger"><?= $villa['square_feet']; ?> M<sup>2</sup></span>
        <hr>
        <h5 class="card-title"><?= $villa['villa_name']; ?></h5>
        <p class="card-text"><?= $villa['description']; ?></p>
        <button type="button" class="btn btn-outline-danger"><?= number_to_currency($villa['price'], 'IDR', 'en_DB'); ?></button>
      </div>
    </div>
  </div>
</div>
<br>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">List Features of <?= $villa['villa_name']; ?></h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Features Name</th>
                        <th>Option</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $no= 1;
                foreach ($features as $row) {
                ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $row['features_name']; ?></td>
                    <td>
                        <a href="/admin-delete-feature/<?= $row['id']; ?>" type="button" class="btn btn-outline-danger">Delete</a> 
                        <a href="/admin-edit-feature/<?= $row['id']; ?>" type="button" class="btn btn-outline-warning">Edit</a> 
                    </td>
                </tr>
                <?php
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">List Content of <?= $villa['villa_name']; ?></h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Image 1</th>
                        <th>Image 2</th>
                        <th>Image 3</th>
                        <th>Image 4</th>
                        <th>Image 5</th>
                        <th>Maps</th>
                        <th>Option</th>
                    </tr>
                </thead>
                <tbody>
                <?php if($villaContent!=null) : ?>
                <tr>
                    <td><img width="150px" src="<?= base_url() . "/uploads/data_content/" . $villaContent['image_1']; ?>" alt="img"></td>
                    <td><img width="150px" src="<?= base_url() . "/uploads/data_content/" . $villaContent['image_2']; ?>" alt="img"></td>
                    <td><img width="150px" src="<?= base_url() . "/uploads/data_content/" . $villaContent['image_3']; ?>" alt="img"></td>
                    <td><img width="150px" src="<?= base_url() . "/uploads/data_content/" . $villaContent['image_4']; ?>" alt="img"></td>
                    <td><img width="150px" src="<?= base_url() . "/uploads/data_content/" . $villaContent['image_5']; ?>" alt="img"></td>
                    <td><iframe width="150px" src="<?= $villaContent['link_maps']; ?>" alt="img"></iframe></td>
                    <td>
                        <a href="/admin-delete-content/<?= $villaContent['id']; ?>" type="button" class="btn btn-outline-danger">Delete</a> 
                        <a href="/admin-edit-content/<?= $villaContent['id']; ?>" type="button" class="btn btn-outline-warning">Edit</a> 
                    </td>
                </tr>
                <?php else : ?>

                <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->

<?= $this->endSection(); ?>