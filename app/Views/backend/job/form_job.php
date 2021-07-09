<div class="card-body card-form">
    <form class="form-horizontal form_open" id="form_job">
        <?= csrf_field(); ?>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="md_location_id">Location <span class="required">*</span></label>
                    <select class="form-control" id="md_location_id" name="md_location_id">
                      <option value="">Select Location</option>
                      <?php foreach ($location as $value) :
                          $location_id    = $value->md_location_id;
                          $location_name  = $value->name; ?>
                          <option value="<?= $location_id ?>"><?= $location_name ?></option>
                      <?php endforeach; ?>
                    </select>
                    <small class="form-text text-danger" id="error_md_location_id"></small>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="md_division_id">Division <span class="required">*</span></label>
                    <select class="form-control" id="md_division_id" name="md_division_id">
                      <option value="">Select Division</option>
                      <?php foreach ($division as $value) :
                          $division_id    = $value->md_division_id;
                          $division_name  = $value->name; ?>
                          <option value="<?= $division_id ?>"><?= $division_name ?></option>
                      <?php endforeach; ?>
                    </select>
                    <small class="form-text text-danger" id="error_md_division_id"></small>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="position">Position <span class="required">*</span></label>
                    <input type="text" class="form-control" id="position" name="position">
                    <small class="form-text text-danger" id="error_position"></small>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="description">Description <span class="required">*</span></label>
                    <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                    <small class="form-text text-danger" id="error_description"></small>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="requirement">Requirement <span class="required">*</span></label>
                    <textarea class="form-control" id="requirement" name="requirement" rows="3"></textarea>
                    <small class="form-text text-danger" id="error_requirement"></small>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="posted_date">Posted Date <span class="required">*</span></label>
                            <input type="text" class="form-control datepicker" id="posted_date" name="posted_date">
                            <small class="form-text text-danger" id="error_posted_date"></small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="expired_date">Expired Date <span class="required">*</span></label>
                            <input type="text" class="form-control datepicker" id="expired_date" name="expired_date">
                            <small class="form-text text-danger" id="error_expired_date"></small>
                        </div>
                    </div>
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
