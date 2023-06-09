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

<!-- Select2 -->
<link rel="stylesheet" href="/assets/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

<section class="content">
    <div class="container-fluid">
    <div class="row">
        <div class="col-12">
        <div class="card">
            <div class="card-header">
            <h3 class="card-title">Order's Information</h3>
            </div>
            <!-- /.card-header -->

            <!-- form start -->
            <form action="<?= base_url(); ?>order/save" method="POST" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <div class="row">
                <div class="col-md-6">
                    <div class="card-body">
                        <div class="form-group mt-3">
                        <label for="user_id">Customer Name</label>
                        <select name="user_id" id="user_id" class="form-control select2" style="width: 100%;" required>
                        <option value="" disabled selected>-- Choose Customer --</option>
                        <?php foreach ($customers as $i) : ?>
                            <option value="<?= $i['id'] ?>" <?= !empty($request->getPost('user_id')) && $request->getPost('user_id') == $i['id'] ? 'selected' : '' ?>><?= $i['username'] ?></option>
                        <?php endforeach ?>
                        </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card-body">
                        <div class="form-group mt-3">
                        <label>Customer ID</label>
                        <input type="text" id="customer_id" class="form-control" value="" readonly style="cursor: not-allowed;">
                        </div>
                    </div>
                </div>
            </div>
            <hr class="mx-3" style="background-color: gray">
            <div class="row">
                <div class="col-md-12">
                    <div class="card-body">
                        <div class="form-group">
                        <label for="table_id">Table Name - Size</label>
                        <select name="table_id" id="table_id" class="form-control select2" style="width: 100%;" required>
                        <option value="" disabled selected>-- Choose Table --</option>
                        <?php foreach ($tables as $i) : ?>
                            <option value="<?= $i['id'] ?>" <?= !empty($request->getPost('table_id')) && $request->getPost('table_id') == $i['id'] ? 'selected' : '' ?>><?= $i['name'] ?> - <?= $i['size'] ?></option>
                        <?php endforeach ?>
                        </select>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="mx-3" style="background-color: gray">
            <div class="row">
                <div class="col-md-8">
                    <div class="card-body">
                        <div class="form-group">
                        <input type="hidden" name="product_id" id="product_id" value="<?= isset($product['id']) ? $product['id'] : ''?>">
                        <label>Product Name</label>
                        <input type="text" class="form-control" placeholder="Name" value="<?= isset($product['name']) ? $product['name'] : '' ?>" readonly style="cursor: not-allowed;">
                        </div>
                        <div class="form-group">
                        <label>Product Price (Rp)</label>
                        <input type="number" class="form-control" placeholder="Price" value="<?= isset($product['price']) ? $product['price'] : '' ?>" readonly style="cursor: not-allowed;">
                        </div>
                        <div class="form-group">
                        <label for="product_quantity">Product Quantity</label>
                        <input type="number" class="form-control" name="product_quantity" id="product_quantity" placeholder="Quantity" required>
                        </div>
                        <div class="form-group">
                        <label>Product Description</label>
                        <textarea class="form-control" rows="3" placeholder="Description" readonly style="cursor: not-allowed;"><?= isset($product['description']) ? $product['description'] : '' ?></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 ml-md-n3 ml-0">
                    <div class="card-body">
                    <?php if (isset($product['image'])) : ?>
                        <div class="form-group text-center">
                        <label class="d-block">Product Image</label>
                        <div class="image-container">
                            <img src="<?= base_url($product['image']) ?>" alt="Current Image" class="img-fluid" width="275">
                            <input type="hidden" name="current_image" value="<?= $product['image'] ?>">
                        </div>
                        </div>
                    <?php endif; ?>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="<?= base_url('order/index/') ?>"  class="btn btn-primary rounded ml-1 float-right" title="Back to List"><i class="fa fa-angle-left"></i> Back to List</a>
            </div>
            </form>
        </div> 
        </div>
        </div>
    </div>
    </div>
</section>

<script>
    $(function () {
    //Initialize Select2 Elements
        $('.select2').select2({
            theme: 'bootstrap4'
        })
    })

    $('#user_id').on('change', function() {
        var selectedCustomerId = $(this).val();
        $('#customer_id').val(selectedCustomerId);
    });
</script>
<script src="/assets/plugins/select2/js/select2.full.min.js"></script>