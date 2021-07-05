<div class="row form form_page">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"><?= $title; ?></h4>
            </div>
            <form class="form-horizontal form_open" id="form_religion">
                <?= csrf_field(); ?>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label for="religion_name">Religion <span class="required">*</span></label>
                                <input type="text" class="form-control" id="religion_name" name="religion_name">
                                <small class="form-text text-danger" id="error_religion_name"></small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label for="religion_description">Description</label>
                                <textarea class="form-control" id="religion_description" name="religion_description" rows="3"></textarea>
                                <small class="form-text text-danger" id="error_religion_description"></small>
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input active" id="religion_isactive" name="religion_isactive">
                                    <label for="religion_isactive" class="custom-control-label">Active</label>
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
