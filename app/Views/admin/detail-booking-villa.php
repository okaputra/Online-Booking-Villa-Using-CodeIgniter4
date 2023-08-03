<?= $this->extend('layout/template-admin'); ?>
<?= $this->section('content'); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- Begin Page Content -->
<div class="container-fluid">

<?= $this->include('layout/content-row'); ?>
<?php 
$villaModel = new \App\Models\Villas();
$villa = $villaModel->find($booking['id_villa']);

$users = new \App\Models\Users();
$user = $users->find($booking['id_user']);

$date = strtotime($booking['created_at']);
?>


    <div class="row">

        <div class="col-lg-6">

            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Customer Detail</b></h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Customer Name</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" value="<?= $user['name']; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Customer Address</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" value="<?= $user['address']; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Customer Email</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" value="<?= $user['username']; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Customer Number</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" value="<?= $user['no_wa']; ?>" readonly>
                    </div>
                </div>
            </div>

            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Detail Booking <b><?= $villa['villa_name']; ?></b></h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Villa Name</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" value="<?= $villa['villa_name']; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Customer Name</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" value="<?= $user['name']; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Customer Address</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" value="<?= $user['address']; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Customer Number</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" value="<?= $user['no_wa']; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Start Date</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" value="<?= $booking['start_date']; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">End Date</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" value="<?= $booking['end_date']; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Price Per Night</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" value="<?= number_to_currency($booking['price'], 'IDR', 'en_DB'); ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Duration</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" value="<?= $booking['duration']; ?> Days" readonly>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Total Price</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" value="<?= number_to_currency($booking['total_price'], 'IDR', 'en_DB'); ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Status</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" value="<?= $booking['status']; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Ordered On</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" value="<?= date('j M Y', $date); ?>" readonly>
                    </div>
                    <button type="button" class="btn btn-primary confirm" data-toggle="modal" data-target="#exampleModalCenter">CONFIRM</button>
                    <button type="button" class="btn btn-danger reject" data-toggle="modal" data-target="#exampleModalCenter">REJECT</button>
                    <a href="https://wa.me/<?= $user['no_wa']; ?>?text=Hello, do you want to book <?= $villa['villa_name']; ?>?" type="button" target="blank" class="btn btn-success"><i class="fa fa-whatsapp"></i> CHAT</a>
                </div>
            </div>

        </div>
    </div>

</div>
<!-- /.container-fluid -->

<script type="text/javascript">
    $(".confirm").click(function(event){
      event.preventDefault();
      // Perform validation here
      swal.fire({
        title: "Are you sure?",
        text: "Confirm this booking?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes!",
        cancelButtonText: "No!",
        customClass: {
          confirmButton: "btn btn-danger",
        },
        allowOutsideClick: () => !Swal.isLoading(),
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = '/admin-confirm-booking/<?= $booking['id']; ?>'
        } else if (result.dismiss === Swal.DismissReason.cancel) {
          swal("Cancelled", "error");
        }
      });
    });
</script>

<script type="text/javascript">
    $(".reject").click(function(event){
      event.preventDefault();
      // Perform validation here
      swal.fire({
        title: "Are you sure?",
        text: "Reject this booking?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes!",
        cancelButtonText: "No!",
        customClass: {
          confirmButton: "btn btn-danger",
        },
        allowOutsideClick: () => !Swal.isLoading(),
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = '/admin-reject-booking/<?= $booking['id']; ?>'
        } else if (result.dismiss === Swal.DismissReason.cancel) {
          swal("Cancelled", "error");
        }
      });
    });
</script>

<?= $this->endSection(); ?>