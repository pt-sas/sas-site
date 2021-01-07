<?= $this->extend('admin/overview'); ?>

<?= $this->section('content'); ?>
<?= $this->include('admin/submenu/form_submenu'); ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="float-left">
                    <button type="button" class="btn bg-gradient-primary btn-sm new_form" title="New Submenu"><i class=" fas fa-plus-circle"> New</i></button>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-hover table-pointer tb_display table-md" style="width: 100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>#</th>
                            <th>Submenu</th>
                            <th>Status</th>
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