<?= $this->extend('layout/template-admin'); ?>
<?= $this->section('content'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Form Input Features</h1>
<form method="post" action="/admin-post-features/<?= $id; ?>">
    <?= csrf_field(); ?>
  <div class="form-group">
    <label for="exampleFormControlInput1">Features Name</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" name="features_name" value="<?= old('features_name');?>" placeholder="e.g Air Conditioner" required>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
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

</div>
<!-- /.container-fluid -->

<?= $this->endSection(); ?>