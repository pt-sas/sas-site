<!DOCTYPE html>
<html>
<head>
    <?= $this->include("layout/head") ?>
</head>
<body>
    <!-- HEADER -->
    <header>
        <?= $this->include("layout/header") ?>
    </header>

    <!-- CONTENT -->
    <section>
        <?= $this->renderSection('content') ?> 
    </section>

    <!-- FOOTER -->
    <footer class="bg-light text-center text-lg-start">
        <?= $this->include("layout/footer") ?>
    </footer>

    <!-- jQuery & Bootstrap-->
	<script src="<?php echo base_url('js/jquery-3.5.1.min.js') ?>"></script>
	<script src="<?php echo base_url('js/bootstrap.min.js') ?>"></script>
</body>
</html>