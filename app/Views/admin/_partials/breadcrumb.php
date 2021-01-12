<?php $request = \Config\Services::request(); ?>
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <?php if (empty($request->uri->getSegment(2))) : ?>
                    <h1 class="m-0 text-dark">Home</h1>
                <?php else : ?>
                    <h1 class="m-0 text-dark"><?= ucfirst($request->uri->getSegment(2)); ?></h1>
                <?php endif ?>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <?php if (!empty($request->uri->getSegment(2))) : ?>
                        <li class="breadcrumb-item"><a href="<?= site_url('/admin') ?>">Home</a></li>
                        <li class="breadcrumb-item active"><?= ucfirst($request->uri->getSegment(2)); ?></li>
                    <?php endif ?>
                </ol>
            </div>
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->