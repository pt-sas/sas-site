<div class="card-body card-form">
    <form class="form-horizontal form_open" id="form_location">
        <?= csrf_field(); ?>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">Name <span class="required">*</span></label>
                    <input type="text" class="form-control" id="name" name="name">
                    <small class="form-text text-danger" id="error_name"></small>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">Name (English) <span class="required">*</span></label>
                    <input type="text" class="form-control" id="name_en" name="name_en">
                    <small class="form-text text-danger" id="error_name_en"></small>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="location">Location <span class="required">*</span></label>
                    <input type="text" class="form-control" id="location" name="location">
                    <small class="form-text text-danger" id="error_location"></small>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea type="text" class="form-control" id="description" name="description" rows="3"></textarea>
                    <small class="form-text text-danger" id="error_description"></small>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="address1">Address 1<span class="required">*</span></label>
                    <textarea class="form-control" id="address1" name="address1" rows="3"></textarea>
                    <small class="form-text text-danger" id="error_address1"></small>
                </div>
            </div>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="subdistrict">Subdistrict<span class="required">*</span></label>
                            <input type="text" class="form-control" id="subdistrict" name="subdistrict">
                            <small class="form-text text-danger" id="error_subdistrict"></small>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="city">City <span class="required">*</span></label>
                            <input type="text" class="form-control" id="city" name="city">
                            <small class="form-text text-danger" id="error_city"></small>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="province">Province <span class="required">*</span></label>
                            <input type="text" class="form-control" id="province" name="province">
                            <small class="form-text text-danger" id="error_province"></small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="phone">Phone <span class="required">*</span></label>
                            <input type="text" class="form-control" id="phone" name="phone">
                            <small class="form-text text-danger" id="error_phone"></small>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="cellular">Cellular</label>
                            <input type="text" class="form-control" id="cellular" name="cellular">
                            <small class="form-text text-danger" id="error_cellular"></small>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="postal">Postal <span class="required">*</span></label>
                            <input type="text" class="form-control" id="postal" name="postal">
                            <small class="form-text text-danger" id="error_postal"></small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="longitude">Longitude <span class="required">*</span></label>
                            <input type="text" class="form-control" id="longitude" name="longitude">
                            <small class="form-text text-danger" id="error_longitude"></small>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="lattitude">Lattitude <span class="required">*</span></label>
                            <input type="text" class="form-control" id="lattitude" name="lattitude">
                            <small class="form-text text-danger" id="error_lattitude"></small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="url">Direction URL <span class="required">*</span></label>
                            <input type="text" class="form-control" id="url" name="url">
                            <small class="form-text text-danger" id="error_url"></small>
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