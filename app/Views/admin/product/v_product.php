<?= $this->extend('admin/overview'); ?>

<?= $this->section('content'); ?>
<?= $this->include('admin/product/form_product'); ?>
<div class="row">
    <div class="col-12">
        <div class="card main_page">
            <div class="card-header">
                <div class="float-left">
                    <?= $button; ?>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-hover table-pointer tb_display table-md" style="width: 100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>#</th>
                            <th>Code Product</th>
                            <th>Product</th>
                            <th>Product Category</th>
                            <th>Qty</th>
                            <th>Width</th>
                            <th>Height</th>
                            <th>Weight</th>
                            <th>Depth</th>
                            <th>Volume</th>
                            <th>UOM</th>
                            <th>Active</th>
                            <th></th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>