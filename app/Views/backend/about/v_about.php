<?= $this->extend('backend/_partials/overview') ?>

<?= $this->section('content'); ?>
<div class="card-body card-main">
  <form class="form-horizontal form_open" id="form_company">
    <?= csrf_field(); ?>
    <div class="row">
      <input type="hidden" class="form-control id" id="id" name="id" value="<?= $about['trx_compro_id']  ?>">
      <div class="col-md-6">
        <div class="form-group">
          <label for="tb_cp_overview" class="placeholder">Overview <span class="required">*</span></label>
          <textarea class="form-control summernote" id="tb_cp_overview" name="tb_cp_overview" rows="3"></textarea>
          <small class="form-text text-danger" id="error_tb_cp_overview"></small>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="tb_cp_overview_en" class="placeholder">Overview (English) <span class="required">*</span></label>
          <textarea class="form-control summernote" id="tb_cp_overview_en" name="tb_cp_overview_en" rows="3"></textarea>
          <small class="form-text text-danger" id="error_tb_cp_overview_en"></small>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="tb_cp_vision" class="placeholder">Vision <span class="required">*</span></label>
          <input type="text" class="form-control" id="tb_cp_vision" name="tb_cp_vision">
          <small class="form-text text-danger" id="error_tb_cp_vision"></small>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="tb_cp_vision_en" class="placeholder">Vision (English) <span class="required">*</span></label>
          <input type="text" class="form-control" id="tb_cp_vision_en" name="tb_cp_vision_en">
          <small class="form-text text-danger" id="error_tb_cp_vision_en"></small>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="tb_cp_mision" class="placeholder">Mission <span class="required">*</span></label>
          <input type="text" class="form-control" id="tb_cp_mision" name="tb_cp_mision">
          <small class="form-text text-danger" id="error_tb_cp_mision"></small>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="tb_cp_mision_en" class="placeholder">Mission (English) <span class="required">*</span></label>
          <input type="text" class="form-control" id="tb_cp_mision_en" name="tb_cp_mision_en">
          <small class="form-text text-danger" id="error_tb_cp_mision_en"></small>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="tb_cp_objectives" class="placeholder">Objectives <span class="required">*</span></label>
          <input type="text" class="form-control" id="tb_cp_objectives" name="tb_cp_objectives">
          <small class="form-text text-danger" id="error_tb_cp_objectives"></small>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="tb_cp_objectives_en" class="placeholder">Objectives (English) <span class="required">*</span></label>
          <input type="text" class="form-control" id="tb_cp_objectives_en" name="tb_cp_objectives_en">
          <small class="form-text text-danger" id="error_tb_cp_objectives_en"></small>
        </div>
      </div>
    </div>
  </form>
</div>
<div class="card-action">
  <button type="button" class="btn btn-primary btn-round ml-auto save_form">Save changes</button>
</div>
<?= $this->endSection() ?>
