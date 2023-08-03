<?= $this->extend('layout/template-admin'); ?>
<?= $this->section('content'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Outer Row -->
<div class="row justify-content-center">

<div class="col-xl-10 col-lg-12 col-md-9">

    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-6 d-none d-lg-block bg-password-image" style="background-image: url('/login/images/bg-admin.jpg');"></div>
                <div class="col-lg-6">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-2">Update Password</h1>
                        </div>
                        <form class="user" method="post" action="/post-admin-update-password/<?php echo $user['id']; ?>">
                            <div class="form-group">
                                <input type="password" class="form-control form-control-user" name="password" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Input new password">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control form-control-user" name="password_confirmation" id="exampleInputEmail" aria-describedby="emailHelp">
                            </div>

                            <button class="btn btn-primary btn-user btn-block" type="submit" >
                                Update
                            </button>
                        </form>
                        <hr>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

</div>

</div>
<!-- /.container-fluid -->

<?= $this->endSection(); ?>