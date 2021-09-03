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
      <?php if ($title == 'Mailbox') : ?>
        <div class="container container-full">
          <div class="page-inner page-inner-fill">
            <?= $this->renderSection('content') ?>
          </div>
        </div>
      <?php else : ?>
        <div class="container">
          <div class="page-inner">
            <?= $this->include('backend/_partials/breadcrumb') ?>
            <?= !$filter ? '' : $this->include($filter) ?>
            <div class="row main_page">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <div class="float-left">
                      <h4 class="card-title"><?= $title; ?></h4>
                    </div>
                    <div class="float-right">
                      <button type="button" class="btn btn-primary btn-sm btn-round ml-auto new_form" title="Location">
                        <i class="fa fa-plus fa-fw"></i> Add New
                      </button>
                    </div>
                  </div>
                  <?= $this->renderSection('content') ?>
                  <div class="card-action card-button">
                    <button type="button" class="btn btn-outline-danger btn-round ml-auto close_form">Close</button>
                    <button type="button" class="btn btn-primary btn-round ml-auto save_form">Save changes</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php endif; ?>
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