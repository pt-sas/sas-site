<!DOCTYPE html>
<html lang="en">
    <?= $this->include('frontend/_partials/head') ?>

    <body>
        <?= $this->include('frontend/_partials/header') ?>
        <?= $this->include('frontend/_partials/sidebar') ?>
        <?= $this->renderSection('content') ?>
        <?= $this->include('frontend/_partials/js') ?>
    </body>
</html>
