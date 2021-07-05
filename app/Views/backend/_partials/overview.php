<!DOCTYPE html>
<html>
  <?= $this->include('backend/_partials/head') ?>
  <body>
    <div class="wrapper">
      <div class="main-header">
        <?= $this->include('backend/_partials/logo') ?>
        <?= $this->include('backend/_partials/navbar') ?>
      </div>
      <?= $this->include('backend/_partials/sidebar') ?>

      <div class="main-panel">
        <div class="container">
          <div class="page-inner">
            <?= $this->include('backend/_partials/breadcrumb') ?>
            <?= $this->renderSection('content') ?>
          </div>
  			</div>
        <?= $this->include('backend/_partials/footer') ?>
      </div>

      <?= $this->include('backend/_partials/quicksidebar') ?>
    </div>
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <?= $this->include('backend/_partials/js') ?>
  </body>
</html>
