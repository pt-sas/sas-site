<?= $this->extend('backend/_partials/overview') ?>

<?= $this->section('content'); ?>

<div class="card-body card-main">
    <table class="table table-bordered table-hover table-pointer tb_display table-md" style="width: 100%">
        <thead>
            <tr>
                <th>No</th>
                <th>IP Address</th>
                <th>Browser</th>
                <th>Operating System</th>
                <th>Time</th>
            </tr>
        </thead>
    </table>
</div>
<?= $this->endSection() ?>
