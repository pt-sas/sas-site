<?= $this->extend('backend/_partials/overview') ?>

<?= $this->section('content'); ?>

<?= $this->include('backend/location/form_location'); ?>
<div class="card-body card-main">
    <table class="table table-bordered table-hover table-pointer tb_display table-md" style="width: 100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>No</th>
                <th>Name</th>
                <th>Name English</th>
                <th>Phone</th>
                <th>Active</th>
                <th>Actions</th>
            </tr>
        </thead>
    </table>
</div>
<?= $this->endSection() ?>