<div class="row form form_page">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"><?= $title; ?></h4>
            </div>
            <form class="form-horizontal form_open" id="form_branch">
                <?= csrf_field(); ?>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label for="region_id">Region <span class="required">*</span></label>
                                <select class="form-control" id="region_id" name="region_id">
                                  <option value="">Select Region</option>
                                  <?php foreach ($region as $value) :
                                      $region_id    = $value['md_region_id'];
                                      $region_name  = $value['md_region_name']; ?>
                                      <option value="<?= $region_id ?>"><?= $region_name ?></option>
                                  <?php endforeach; ?>
                                </select>
                                <small class="form-text text-danger" id="error_region_id"></small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label for="branch_name">Name <span class="required">*</span></label>
                                <input type="text" class="form-control" id="branch_name" name="branch_name">
                                <small class="form-text text-danger" id="error_branch_name"></small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label for="branch_address">Address</label>
                                <textarea class="form-control" id="branch_address" name="branch_address" rows="3"></textarea>
                                <small class="form-text text-danger" id="error_branch_address"></small>
                            </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group form-group-default">
                              <label for="branch_phone">Phone</label>
                              <input type="text" class="form-control" id="branch_phone" name="branch_phone">
                              <small class="form-text text-danger" id="error_branch_phone"></small>
                          </div>
                          <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input active" id="branch_isactive" name="branch_isactive">
                                <label for="branch_isactive" class="custom-control-label">Active</label>
                            </div>
                          </div>
                        </div>
                    </div>
                </div>
            </form>
            <div class="card-action">
                <button type="button" class="btn btn-outline-danger btn-round ml-auto close_form">Close</button>
                <button type="button" class="btn btn-primary btn-round ml-auto save_form">Save changes</button>
            </div>
        </div>
    </div>
</div>
