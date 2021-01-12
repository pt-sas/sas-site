<?= $this->extend('admin/overview'); ?>

<?= $this->section('content'); ?>
<?= $this->include('admin/location/form_location'); ?>
<?= $this->include('admin/location/map'); ?>
<div class="row">
    <div class="col-12">
        <div class="card main_page">
            <div class="card-header">
                <div class="float-left">
                    <?= $button; ?>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-hover table-pointer tb_display" style="width: 100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>#</th>
                            <th>Name</th>
                            <th>Address1</th>
                            <th>Address2</th>
                            <th>Address3</th>
                            <th>Address4</th>
                            <th>District</th>
                            <th>Subdistrict</th>
                            <th>City</th>
                            <th>Province</th>
                            <th>Phone</th>
                            <!-- <th>Cellular</th> -->
                            <th>Postal</th>
                            <th>Maps</th>
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