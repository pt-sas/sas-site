<?= $this->extend('backend/_partials/overview') ?>

<?= $this->section('content'); ?>

<?= $this->include('backend/principal/form_principal'); ?>
<div class="card-body card-main">
    <table class="table table-bordered table-hover table-pointer tb_display table-md" style="width: 100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>No</th>
                <th>Image</th>
                <th>Principal</th>
                <th>Description</th>
                <th>Url</th>
                <th>Active</th>
                <th>Actions</th>
            </tr>
        </thead>
    </table>
</div>
<?= $this->endSection() ?>