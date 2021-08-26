<div class="card-body card-form">
    <form class="form-horizontal form_open" id="form_job">
        <?= csrf_field(); ?>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="md_division_id">Division <span class="required">*</span></label>
                    <select class="form-control select2" id="md_division_id" name="md_division_id">
                        <option value="">Select Division</option>
                        <?php foreach ($division as $value) : ?>
                            <option value="<?= $value->md_division_id ?>"><?= $value->name ?></option>
                        <?php endforeach; ?>
                    </select>
                    <small class="form-text text-danger" id="error_md_division_id"></small>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="value">Position <span class="required">*</span></label>
                    <input type="text" class="form-control" id="value" name="value">
                    <small class="form-text text-danger" id="error_value"></small>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="level">Level <span class="required">*</span></label>
                    <select class="form-control select2" id="level" name="level">
                        <option value="">Select Level</option>
                        <option value="EL">Entry Level</option>
                        <option value="ML">Mid Level</option>
                        <option value="SL">Senior Level</option>
                    </select>
                    <small class="form-text text-danger" id="error_level"></small>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="description">Description <span class="required">*</span></label>
                    <textarea class="form-control summernote" id="description" name="description" rows="3"></textarea>
                    <small class="form-text text-danger" id="error_description"></small>
                </div>
                <div class="form-group">
                    <label for="requirement">Requirement <span class="required">*</span></label>
                    <textarea class="form-control summernote" id="requirement" name="requirement" rows="3"></textarea>
                    <small class="form-text text-danger" id="error_requirement"></small>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="description_en">Description (English)<span class="required">*</span></label>
                    <textarea class="form-control summernote" id="description_en" name="description_en" rows="3"></textarea>
                    <small class="form-text text-danger" id="error_description_en"></small>
                </div>
                <div class="form-group">
                    <label for="requirement_en">Requirement (English)<span class="required">*</span></label>
                    <textarea class="form-control summernote" id="requirement_en" name="requirement_en" rows="3"></textarea>
                    <small class="form-text text-danger" id="error_requirement_en"></small>
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
            <div class="col-md-6">
                <div class="form-group">
                    <label for="url">Jobstreet URL <span class="required">*</span></label>
                    <input type="text" class="form-control" id="url" name="url">
                    <small class="form-text text-danger" id="error_url"></small>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="url1">JobsDB URL </label>
                    <input type="text" class="form-control" id="url1" name="url1">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="url2">Karir URL </label>
                    <input type="text" class="form-control" id="url2" name="url2">
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