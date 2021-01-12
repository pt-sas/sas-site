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
    <a href="https://wa.me/6282169557882?" class="whatsapp" role="button"><i class="fa fa-whatsapp fa-2x"></i></a>
    <a href="javascript:void(0);" class="scroll-to-top" role="button" onclick="window.scroll(0,1);"><i class="fa fa-chevron-up"></i></a>

    <!-- jQuery & Bootstrap-->
	<script src="<?php echo base_url('js/jquery-3.5.1.min.js') ?>"></script>
    <script src="<?php echo base_url('js/bootstrap.min.js') ?>"></script>
    <script>
        enterView({
            selector: stepSel.nodes(),
            offset: 0.5,
            enter: el => {
                const index = +d3.select(el).attr('data-index');
                updateChart(index);
            },
            exit: el => {
                let index = +d3.select(el).attr('data-index');
                index = Math.max(0, index - 1);
                updateChart(index);
            }
        });

    </script>
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
    <script>
    $(function () {
        'use strict'
        $('[data-toggle="offcanvas"]').on('click', function () {
            $('.offcanvas-collapse').toggleClass('open')
        })
    })
    </script>
</body>
</html>