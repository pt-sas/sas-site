<?= $this->extend('admin/overview'); ?>

<?= $this->section('content'); ?>
<?= $this->include('admin/menu/form_menu'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-3 col-6">
            <p>Test</p>
            <button type="button" class="btn bg-gradient-primary btn-sm" title="New Product" id="new_menu"><i class=" fas fa-plus-circle"> New</i></button>
        </div>
        <div class="col-lg-3 col-6">
        </div>
    </div>
</div>
<?= $this->endSection(); ?>