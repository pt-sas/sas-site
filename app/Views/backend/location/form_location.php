<div class="row form form_page">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"><?= $title; ?></h4>
            </div>
            <form class="form-horizontal form_open" id="form_location">
                <?= csrf_field(); ?>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="location_name">Name <span class="required">*</span></label>
                                <input type="text" class="form-control" id="location_name" name="location_name">
                                <small class="form-text text-danger" id="error_location_name"></small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="location_description">Description</label>
                                <input type="text" class="form-control" id="location_description" name="location_description">
                                <small class="form-text text-danger" id="error_location_description"></small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="location_location">Location <span class="required">*</span></label>
                                <input type="text" class="form-control" id="location_location" name="location_location">
                                <small class="form-text text-danger" id="error_location_location"></small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="location_address1">Address 1<span class="required">*</span></label>
                                <textarea class="form-control" id="location_address1" name="location_address1" rows="3"></textarea>
                                <small class="form-text text-danger" id="error_location_address1"></small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group">
                                      <label for="location_subdistrict">Subdistrict<span class="required">*</span></label>
                                      <input type="text" class="form-control" id="location_subdistrict" name="location_subdistrict">
                                      <small class="form-text text-danger" id="error_location_subdistrict"></small>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                      <label for="location_district">District<span class="required">*</span></label>
                                      <input type="text" class="form-control" id="location_district" name="location_district">
                                      <small class="form-text text-danger" id="error_location_district"></small>
                                  </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="location_city">City <span class="required">*</span></label>
                                        <input type="text" class="form-control" id="location_city" name="location_city">
                                        <small class="form-text text-danger" id="error_location_city"></small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="location_province">Province <span class="required">*</span></label>
                                        <input type="text" class="form-control" id="location_province" name="location_province">
                                        <small class="form-text text-danger" id="error_location_province"></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="location_phone">Phone <span class="required">*</span></label>
                                        <input type="text" class="form-control" id="location_phone" name="location_phone">
                                        <small class="form-text text-danger" id="error_location_phone"></small>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="location_cellular">Cellular</label>
                                        <input type="text" class="form-control" id="location_cellular" name="location_cellular">
                                        <small class="form-text text-danger" id="error_location_cellular"></small>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="location_postal">Postal <span class="required">*</span></label>
                                        <input type="text" class="form-control" id="location_postal" name="location_postal">
                                        <small class="form-text text-danger" id="error_location_postal"></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="location_longitude">Longitude <span class="required">*</span></label>
                                        <input type="text" class="form-control" id="location_longitude" name="location_longitude">
                                        <small class="form-text text-danger" id="error_location_longitude"></small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="location_lattitude">Lattitude <span class="required">*</span></label>
                                        <input type="text" class="form-control" id="location_lattitude" name="location_lattitude">
                                        <small class="form-text text-danger" id="error_location_lattitude"></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                              <div class="custom-control custom-checkbox">
                                  <input type="checkbox" class="custom-control-input active" id="location_isactive" name="location_isactive">
                                  <label for="location_isactive" class="custom-control-label">Active</label>
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
