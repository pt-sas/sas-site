<div class="row form">
    <div class="col-12">
        <div class="card card-outline card-info form_page">
            <div class="card-header">
                <h3 class="card-title"></h3>
            </div>
            <form class="form-horizontal form_open" id="form_location">
                <?= csrf_field(); ?>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="loc_name">Name <span class="required">*</span></label>
                                <input type="text" class="form-control" id="loc_name" name="loc_name" placeholder="Enter location name">
                                <small class="form-text text-danger" id="error_loc_name"></small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="loc_desc">Description</label>
                                <textarea class="form-control" id="loc_desc" name="loc_desc" rows="2"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="loc_address1">Address 1 </label>
                                <input type="text" class="form-control" id="loc_address1" name="loc_address1">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="loc_address2">Address 2 </label>
                                <input type="text" class="form-control" id="loc_address2" name="loc_address2">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="loc_address3">Address 3 </label>
                                <input type="text" class="form-control" id="loc_address3" name="loc_address3">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="loc_address4">Address 4 </label>
                                <input type="text" class="form-control" id="loc_address4" name="loc_address4">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="loc_district">District </label>
                                <input type="text" class="form-control" id="loc_district" name="loc_district">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="loc_subdistrict">Subdistrict </label>
                                <input type="text" class="form-control" id="loc_subdistrict" name="loc_subdistrict">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="loc_city">City </label>
                                <input type="text" class="form-control" id="loc_city" name="loc_city">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="loc_province">Province </label>
                                <input type="text" class="form-control" id="loc_province" name="loc_province">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="loc_postal">Postal </label>
                                <input type="text" class="form-control" id="loc_postal" name="loc_postal">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="loc_phone">Phone </label>
                                <input type="text" class="form-control number" id="loc_phone" name="loc_phone">
                            </div>
                        </div>
                        <!-- <div class="col-md-6">
                            <div class="form-group">
                                <label for="loc_cellular">Cellular </label>
                                <input type="text" class="form-control" id="loc_cellular" name="loc_cellular">
                            </div>
                        </div> -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="loc_lat">Latitude </label>
                                <input type="text" class="form-control" id="loc_lat" name="loc_lat">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="loc_long">Longitude </label>
                                <input type="text" class="form-control" id="loc_long" name="loc_long">
                            </div>
                        </div>                        
                        <div class="col-md-2">
                            <div class="form-group mt-4">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input active" id="loc_isactive" name="loc_isactive">
                                    <label for="loc_isactive" class="custom-control-label">Active</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <div class="card-footer">
                <div class="float-right">
                    <button type="button" class="btn btn-outline-danger close_form">Close</button>
                    <button type="button" class="btn btn-outline-primary save_form">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</div>