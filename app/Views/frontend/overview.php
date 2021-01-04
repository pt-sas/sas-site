<!DOCTYPE html>
<html>
<head>
    <?= $this->include("frontend/layout/head") ?>
</head>
<body id="page-top">
    <!-- HEADER -->
    <header>
        <?= $this->include("frontend/layout/header") ?>
    </header>

    <!-- CONTENT -->
    <section>
        <?= $this->renderSection('content') ?> 
    </section>

    <!-- FOOTER -->
    <?= $this->include("frontend/layout/footer") ?>

    <!-- jQuery & Bootstrap-->
	<script src="<?php echo base_url('js/jquery-3.5.1.min.js') ?>"></script>
	<script src="<?php echo base_url('js/bootstrap.min.js') ?>"></script>
</body>
</html>