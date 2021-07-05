<!DOCTYPE html>
<html>
  <?= $this->include('backend/_partials/head') ?>
  <body id="page-top">
    <div id="wrapper">
      <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
          <div class="container-fluid">
            <?= $this->renderSection('content') ?>
          </div>
        </div>
      </div>
    </div>

    <?= $this->include('backend/_partials/js') ?>
  </body>
</html>
