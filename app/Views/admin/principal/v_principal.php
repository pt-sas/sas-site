<?= $this->extend('admin/overview'); ?>

<?= $this->section('content'); ?>
<?= $this->include('admin/principal/form_principal'); ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="float-left">
                    <button type="button" class="btn bg-gradient-primary btn-sm new_form" title="New Principal"><i class=" fas fa-plus-circle"> New</i></button>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-hover table-pointer tb_display table-md" style="width: 100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>#</th>
                            <th>Principal</th>
                            <th>Description</th>
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