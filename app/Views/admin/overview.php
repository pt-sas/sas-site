<!DOCTYPE html>
<html lang="en">

<head>
    <?= $this->include('admin/_partials/head'); ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <?= $this->include('admin/_partials/navbar'); ?>

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <?= $this->include('admin/_partials/sidebar'); ?>
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <?= $this->include('admin/_partials/breadcrumb'); ?>

            <!-- Main content -->
            <section class="content">
                <?= $this->renderSection('content'); ?>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Footer -->
        <?= $this->include('admin/_partials/footer'); ?>
    </div>
    <!-- ./wrapper -->

    <?= $this->include('admin/_partials/js'); ?>
</body>

</html>