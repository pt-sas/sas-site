<!DOCTYPE html>
<html lang="en">
    <?= $this->include('frontend/_partials/head') ?>

    <body>
        <?= $this->include('frontend/_partials/header') ?>
        <?= $this->include('frontend/_partials/sidebar') ?>
        <?= $this->renderSection('content') ?>
        <a href="https://wa.me/6282169557882?" target="_blank" class="whatsapp" role="button"><i class="fa fa-whatsapp fa-2x"></i></a>
        <?= $this->include('frontend/_partials/js') ?>
    </body>
</html>
