<div class="row form form_page">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"><?= $title; ?></h4>
            </div>
            <form class="form-horizontal form_open" id="form_workingdays">
                <?= csrf_field(); ?>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label for="workingdays_name">Working Days <span class="required">*</span></label>
                                <input type="text" class="form-control" id="workingdays_name" name="workingdays_name">
                                <small class="form-text text-danger" id="error_workingdays_name"></small>
                            </div>
                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-group form-group-default">
                                    <label for="workingdays_timein">Time In <span class="required">*</span></label>
                                    <input type="text" class="form-control timepicker" id="workingdays_timein" name="workingdays_timein">
                                    <small class="form-text text-danger" id="error_workingdays_timein"></small>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group form-group-default">
                                    <label for="workingdays_timeout">Time Out <span class="required">*</span></label>
                                    <input type="text" class="form-control timepicker" id="workingdays_timeout" name="workingdays_timeout">
                                    <small class="form-text text-danger" id="error_workingdays_timeout"></small>
                                </div>
                              </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label for="workingdays_description">Description</label>
                                <textarea class="form-control" id="workingdays_description" name="workingdays_description" rows="3"></textarea>
                                <small class="form-text text-danger" id="error_workingdays_description"></small>
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input active" id="workingdays_isactive" name="workingdays_isactive">
                                    <label for="workingdays_isactive" class="custom-control-label">Active</label>
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
