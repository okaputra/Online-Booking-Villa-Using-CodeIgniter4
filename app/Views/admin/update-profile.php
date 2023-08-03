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
                            <h1 class="h4 text-gray-900 mb-2">Update Profile</h1>
                        </div>
                        <form class="user" method="post" action="/post-admin-update-profile/<?php echo $user['id']; ?>">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" name="username" id="exampleInputEmail" aria-describedby="emailHelp" value="<?php echo $user['username']; ?>">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" name="name" id="exampleInputEmail" aria-describedby="emailHelp" value="<?php echo $user['name']; ?>">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" name="address" id="exampleInputEmail" aria-describedby="emailHelp" value="<?php echo $user['address']; ?>">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" name="no_wa" id="exampleInputEmail" aria-describedby="emailHelp" value="<?php echo $user['no_wa']; ?>">
                            </div>

                            <button class="btn btn-primary btn-user btn-block" type="submit" >
                                Update
                            </button>
                        </form>
                        <hr>
                        <div class="text-center">
                            <a class="small" href="/admin-update-password/<?php echo $user['id']; ?>">Update Password</a>
                        </div>
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