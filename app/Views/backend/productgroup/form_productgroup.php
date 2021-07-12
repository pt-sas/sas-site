<div class="card-body card-form">
    <form class="form-horizontal form_open" id="form_productgroup">
        <?= csrf_field(); ?>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="md_principal_id">Principal <span class="required">*</span></label>
                    <select class="form-control" id="md_principal_id" name="md_principal_id">
                      <option value="">Select Principal</option>
                      <?php foreach ($principal as $value) :
                          $principal_id    = $value->md_principal_id;
                          $principal_name  = $value->name; ?>
                          <option value="<?= $principal_id ?>"><?= $principal_name ?></option>
                      <?php endforeach; ?>
                    </select>
                    <small class="form-text text-danger" id="error_md_principal_id"></small>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">Name <span class="required">*</span></label>
                    <input type="text" class="form-control" id="name" name="name">
                    <small class="form-text text-danger" id="error_name"></small>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" class="form-control" id="description" name="description">
                    <small class="form-text text-danger" id="error_description"></small>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input active" id="isactive" name="isactive">
                        <label for="isactive" class="custom-control-label">Active</label>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
