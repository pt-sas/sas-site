<?= $this->extend('backend/_partials/overview') ?>

<?= $this->section('content'); ?>

<?= $this->include('backend/product/form_product'); ?>
<div class="card-body card-main">
    <table class="table table-border table-hover table-pointer tb_product" style="width: 100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>No</th>
                <th>Code</th>
                <th>Name</th>
                <th>Image</th>
                <th>iDempiere Code</th>
                <th>Principal</th>
                <th>Category 1</th>
                <th>Category 2</th>
                <th>Category 3</th>
                <th>Color</th>
                <th>Weight</th>
                <th>Width</th>
                <th>Height</th>
                <th>Depth</th>
                <th>Volume</th>
                <th>Visible</th>
                <th>Active</th>
                <th>Actions</th>
            </tr>
        </thead>
    </table>
</div>
<?= $this->endSection() ?>