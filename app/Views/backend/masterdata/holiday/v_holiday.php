<?= $this->extend('backend/_partials/overview') ?>

<?= $this->section('content'); ?>

<?= $this->include('backend/masterdata/holiday/form_holiday'); ?>
<div class="row main_page">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <h4 class="card-title"><?= $title; ?></h4>
                    <?= $button; ?>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-hover table-pointer tb_display table-md" style="width: 100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>No</th>
                            <th>Date</th>
                            <th>Description</th>
                            <th>Active</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
