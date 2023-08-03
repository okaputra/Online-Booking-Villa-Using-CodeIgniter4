<?= $this->extend('layout/template-admin'); ?>
<?= $this->section('content'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

<?= $this->include('layout/content-row'); ?>

<div class="row">
    <!-- Begin Page Content -->
    <div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Choose to input Features</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Villa Name</th>
                        <th>Price</th>
                        <th>Thumbnail</th>
                        <th>Option</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $no= 1;
                foreach ($villa as $row) {
                ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $row['villa_name']; ?></td>
                    <td><?= number_to_currency($row['price'], 'IDR', 'en_DB'); ?></td>
                    <td>
                        <img width="150px" src="<?= base_url() . "/uploads/data_thumbnail/" . $row['thumbnail']; ?>" alt="img">
                    </td>
                    <td>
                        <a href="/admin-insert-new-features/<?= $row['id']; ?>" type="button" class="btn btn-outline-primary">Insert Features</a> 
                        <a href="/admin-delete-villa/<?= $row['id']; ?>" type="button" class="btn btn-outline-danger">Delete</a> 
                        <a href="/admin-edit-villa/<?= $row['id']; ?>" type="button" class="btn btn-outline-warning">Edit</a> 
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
</div>

</div>
<!-- /.container-fluid -->

<?= $this->endSection(); ?>