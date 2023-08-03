<?= $this->extend('layout/template-admin'); ?>
<?= $this->section('content'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Form Input Content</h1>
<form method="post" action="/admin-post-content/<?= $id; ?>" enctype="multipart/form-data">
    <?= csrf_field(); ?>
    <div class="form-group">
        <label for="exampleFormControlFile1">Image 1</label>
        <input type="file" class="form-control-file" id="exampleFormControlFile1" name="image_1" required>
    </div>
    <div class="form-group">
        <label for="exampleFormControlFile1">Image 2</label>
        <input type="file" class="form-control-file" id="exampleFormControlFile1" name="image_2" required>
    </div>
    <div class="form-group">
        <label for="exampleFormControlFile1">Image 3</label>
        <input type="file" class="form-control-file" id="exampleFormControlFile1" name="image_3" required>
    </div>
    <div class="form-group">
        <label for="exampleFormControlFile1">Image 4</label>
        <input type="file" class="form-control-file" id="exampleFormControlFile1" name="image_4" required>
    </div>
    <div class="form-group">
        <label for="exampleFormControlFile1">Image 5</label>
        <input type="file" class="form-control-file" id="exampleFormControlFile1" name="image_5" required>
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Maps Link</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="link_maps" required>
     </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
<br>
<!-- DataTales Example -->


</div>
<!-- /.container-fluid -->

<?= $this->endSection(); ?>