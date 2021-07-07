<?= $this->extend('backend/_partials/overview') ?>

<?= $this->section('content'); ?>
<div class="row form">
  <div class="col-md-12">
    <div class="card card-with-nav">
      <div class="card-header">
        <div class="row row-nav-line">
          <ul class="nav nav-tabs nav-line nav-color-secondary w-100 pl-3" role="tablist">
            <li class="nav-item"> <a class="nav-link active show" data-toggle="tab" href="#home" role="tab" aria-selected="true">General</a> </li>
          </ul>
        </div>
      </div>
      <form class="form-horizontal form_open" id="form_company">
        <?= csrf_field(); ?>
        <div class="card-body">
          <div class="row">
            <input type="hidden" class="form-control id" id="id" name="id" value="<?= $about['trx_compro_id']  ?>">
            <div class="col-md-12">
              <div class="form-group">
                <label for="about_overview" class="placeholder">Overview <span class="required">*</span></label>
                <textarea class="form-control" id="about_overview" name="about_overview" rows="3"></textarea>
                <small class="form-text text-danger" id="error_about_overview"></small>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label for="about_vision" class="placeholder">Vision <span class="required">*</span></label>
                <textarea class="form-control" id="about_vision" name="about_vision" rows="3"></textarea>
                <small class="form-text text-danger" id="error_about_vision"></small>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label for="about_mision" class="placeholder">Mission <span class="required">*</span></label>
                <textarea class="form-control" id="about_mision" name="about_mision" rows="3"></textarea>
                <small class="form-text text-danger" id="error_about_mision"></small>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label for="about_value" class="placeholder">Core <span class="required">*</span></label>
                <textarea class="form-control" id="about_value" name="about_value" rows="3"></textarea>
                <small class="form-text text-danger" id="error_about_value"></small>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label for="about_objectives" class="placeholder">Objectives <span class="required">*</span></label>
                <textarea class="form-control" id="about_objectives" name="about_objectives" rows="3"></textarea>
                <small class="form-text text-danger" id="error_about_objectives"></small>
              </div>
            </div>
          </div>
        </div>
      </form>
      <div class="card-action">
        <button type="button" class="btn btn-primary btn-round ml-auto save_form">Save changes</button>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>
