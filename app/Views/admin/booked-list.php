<?= $this->extend('layout/template-admin'); ?>
<?= $this->section('content'); ?>

<style>
    select {
        width: 300px;
        padding: 12px;
        border: 0 !important;
        background-color: #858796;
        /* needed */
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        /* SVG background image */
        background-image: url("data:image/svg+xml;charset=UTF-8,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2212%22%20height%3D%2212%22%20viewBox%3D%220%200%2012%2012%22%3E%3Ctitle%3Edown-arrow%3C%2Ftitle%3E%3Cg%20fill%3D%22%23000000%22%3E%3Cpath%20d%3D%22M10.293%2C3.293%2C6%2C7.586%2C1.707%2C3.293A1%2C1%2C0%2C0%2C0%2C.293%2C4.707l5%2C5a1%2C1%2C0%2C0%2C0%2C1.414%2C0l5-5a1%2C1%2C0%2C1%2C0-1.414-1.414Z%22%20fill%3D%22%23000000%22%3E%3C%2Fpath%3E%3C%2Fg%3E%3C%2Fsvg%3E");
            background-size: .6em;
            background-position: calc(100% - 1.3em) center;
            background-repeat: no-repeat;
    }
    select::-ms-expand {
        display: none;
    }
</style>

<!-- Begin Page Content -->
<div class="container-fluid">

<?= $this->include('layout/content-row'); ?>

<div class="row">
    <!-- Begin Page Content -->
    <div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">List Booked Villa</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Villa</th>
                        <th>Order By</th>
                        <th>Total Price</th>
                        <th>Status</th>
                        <th>Option</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $no = 1;
                foreach ($booking as $row) {
                    // Retrieve the corresponding villa record
                    $villaModel = new \App\Models\Villas();
                    $villa = $villaModel->find($row['id_villa']);

                    $users = new \App\Models\Users();
                    $user = $users->find($row['id_user']);
                    // Output the villa name instead of the villa ID
                    ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $villa['villa_name']; ?></td>
                        <td><?= $user['name']; ?></td>
                        <td><?= number_to_currency($row['total_price'], 'IDR', 'en_DB'); ?></td>
                        <td><?= $row['status']; ?></td>
                        <td>
                            <a href="/admin-check-detail-booking/<?= $row['id']; ?>" type="button" class="btn btn-outline-primary">View Payment</a> 
                            <a href="/admin-delete-booking/<?= $row['id']; ?>" type="button" class="btn btn-outline-danger">Delete</a>
                            <button type="button"  data-toggle="modal" data-target="#exampleModalCenter" class="btn btn-outline-success">Change Status</button>
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

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Change Status</b> </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
        <?php if($booking!=null) : ?>
            <form id="booking" method="POST" action="/admin-change-status/<?= $row['id']; ?>">
            <?= csrf_field(); ?>
                <div class="form-group">
                <label for="exampleFormControlInput1">Current Status</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="" value="<?= $row['status']; ?>" readonly>
                </div>
                <select name="status" aria-invalid="false">
                    <option value="Paid">Paid</option>
                    <option value="Waiting">Waiting</option>
                    <option value="Reject">Reject</option>
                </select>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary book">Submit</button>
            </div>
            </form>
        <?php else : ?>
        
        <?php endif; ?>
    </div>
    </div>
</div>


</div>
<!-- /.container-fluid -->
</div>

</div>
<!-- /.container-fluid -->

<?= $this->endSection(); ?>