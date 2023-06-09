<!-- Main content -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

<!-- Font Awesome -->
<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">

<!-- DataTables -->
<link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

<!-- Theme style -->
<link rel="stylesheet" href="dist/css/adminlte.min.css">

<section class="content">
    <div class="container-fluid">
    <div class="row">
        <div class="col-12">
        <div class="card">
            <div class="card-header">
            <h3 class="card-title">Product's Information</h3>
            </div>
            <!-- /.card-header -->

            <!-- form start -->
            <form action="<?= base_url(); ?>product/save" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= isset($data['id']) ? $data['id'] : '' ?>">
            <?= csrf_field(); ?>
            <div class="card-body">
                <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="<?= isset($data['name']) ? $data['name'] : '' ?>" required>
                </div>
                <div class="form-group">
                <label for="price">Price (Rp)</label>
                <input type="number" class="form-control" id="price" name="price" placeholder="Price" value="<?= isset($data['price']) ? $data['price'] : '' ?>" required>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" rows="3" placeholder="Description" id="description" name="description" required><?= isset($data['description']) ? $data['description'] : '' ?></textarea>
                </div>
                <?php if (isset($data['image'])) : ?>
                    <div class="form-group">
                        <label>Current Image</label>
                        <div>
                            <img src="<?= base_url($data['image']) ?>" alt="Current Image" width="100">
                            <input type="hidden" name="current_image" value="<?= $data['image'] ?>">
                        </div>
                    </div>
                <?php endif; ?>
                <div class="form-group">
                    <label for="image">Image</label>
                    <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="image" name="image" accept="image/png, image/jpg, image/jpeg" required>
                        <label class="custom-file-label" for="image">Choose File</label>
                    </div>
                    </div>
                </div>
                <div class="form-group" id="image-preview-label" style="display: none;">
                    <label>Preview Image</label>
                </div>
                <div class="form-group">
                    <div class="mt-n3" id="image-preview"></div>
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="<?= base_url('product/index/') ?>"  class="btn btn-primary rounded ml-1 float-right" title="Back to List"><i class="fa fa-angle-left"></i> Back to List</a>
            </div>
            </form>
        </div>
        </div>
    </div>
    </div>
</section>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // Add event listener to update the label text when a file is selected
    $(document).ready(function() {
        $('.custom-file-input').on('change', function() {
            var fileName = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').html(fileName);
            readURL(this);
    });

    // Function to preview the selected image
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#image-preview').html('<img src="' + e.target.result + '" alt="Preview Image" width="100">');
                $('#image-preview-label').show();
            }
            reader.readAsDataURL(input.files[0]);
        } else {
            $('#image-preview').empty();
            $('#image-preview-label').hide();
        }
    }
    });
</script>