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
            <?php if (!empty(session()->getFlashdata('error'))) : ?>
              <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <?= session()->getFlashdata('error'); ?>
              </div>
            <?php endif; ?>

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
                      <?php $request = \Config\Services::request(); ?>
                      <?= $toolbar_button ?>
                      <?php if ($request->uri->getSegment(2) === 'product') { ?>
                        <button type="button" class="btn btn-info btn-sm btn-border btn-round ml-auto btn_export" title="Export">
                          <i class="fas fa-file-export"></i> Export
                        </button>
                      <?php } ?>
                    </div>
                  </div>
                  <?= $this->renderSection('content') ?>
                  <?= $action_button ?>
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