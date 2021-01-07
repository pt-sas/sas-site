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
    <a href="javascript:void(0);" class="scroll-to-top" role="button" onclick="window.scroll(0,1);"><i class="fa fa-arrow-up"></i></a>

    <!-- jQuery & Bootstrap-->
	<script src="<?php echo base_url('js/jquery-3.5.1.min.js') ?>"></script>
	<script src="<?php echo base_url('js/bootstrap.min.js') ?>"></script>
    <script>
    // Scroll to top button appear
    $(document).on('scroll', function() {
        var scrollDistance = $(this).scrollTop();
        if (scrollDistance > 100) {
            $('.scroll-to-top').fadeIn();
        } else {
            $('.scroll-to-top').fadeOut();
        }
    });
    </script>
</body>
</html>