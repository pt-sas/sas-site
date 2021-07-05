<?= $this->extend('backend/_partials/overview') ?>

<?= $this->section('content'); ?>

<div class="row form">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"><?= $title; ?></h4>
            </div>
            <form class="form-horizontal form_open" id="form_company">
                <?= csrf_field(); ?>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                              <label for="company_name" class="placeholder">Company Name <span class="required">*</span></label>
                              <input type="text" class="form-control" id="company_name" name="company_name">
                              <small class="form-text text-danger" id="error_company_name"></small>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group form-group-default">
                              <label for="company_address" class="placeholder">Company Address <span class="required">*</span></label>
                              <textarea class="form-control" id="company_address" name="company_address" rows="3"></textarea>
                              <small class="form-text text-danger" id="error_company_address"></small>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group form-group-default">
                              <label for="company_phone" class="placeholder">Company Phone <span class="required">*</span></label>
                              <input type="text" class="form-control" id="company_phone" name="company_phone">
                              <small class="form-text text-danger" id="error_company_phone"></small>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group form-group-default">
                              <label for="company_hrd" class="placeholder">Head of HRD <span class="required">*</span></label>
                              <input type="text" class="form-control" id="company_hrd" name="company_hrd">
                              <small class="form-text text-danger" id="error_company_hrd"></small>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group form-group-default">
                              <label for="company_hrdmail" class="placeholder">HRD e-Mail <span class="required">*</span></label>
                              <input type="text" class="form-control" id="company_hrdmail" name="company_hrdmail">
                              <small class="form-text text-danger" id="error_company_hrdmail"></small>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group form-group-default">
                              <label for="company_bpjslimit" class="placeholder">BPJS Limit <span class="required">*</span></label>
                              <input type="text" class="form-control" id="company_bpjslimit" name="company_bpjslimit">
                              <small class="form-text text-danger" id="error_company_bpjslimit"></small>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group form-group-default">
                              <label for="company_pensionlimit" class="placeholder">Pension Limit <span class="required">*</span></label>
                              <input type="text" class="form-control" id="company_pensionlimit" name="company_pensionlimit">
                              <small class="form-text text-danger" id="error_company_pensionlimit"></small>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group form-group-default">
                              <label for="company_cutoff" class="placeholder">Cut Off Limit <span class="required">*</span></label>
                              <input type="text" class="form-control" id="company_cutoff" name="company_cutoff">
                              <small class="form-text text-danger" id="error_company_cutoff"></small>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group form-group-default">
                              <label for="company_pensionage" class="placeholder">Pension Age <span class="required">*</span></label>
                              <input type="text" class="form-control" id="company_pensionage" name="company_pensionage">
                              <small class="form-text text-danger" id="error_company_pensionage"></small>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group form-group-default">
                              <label for="company_positioncostlimit" class="placeholder">Position Cost Limit <span class="required">*</span></label>
                              <input type="text" class="form-control" id="company_positioncostlimit" name="company_positioncostlimit">
                              <small class="form-text text-danger" id="error_company_positioncostlimit"></small>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group form-group-default">
                              <label for="company_class1limit" class="placeholder">BPJS Class 1 Limit <span class="required">*</span></label>
                              <input type="text" class="form-control" id="company_class1limit" name="company_class1limit">
                              <small class="form-text text-danger" id="error_company_class1limit"></small>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group form-group-default">
                              <label for="company_class2limit" class="placeholder">BPJS Class 2 Limit <span class="required">*</span></label>
                              <input type="text" class="form-control" id="company_class2limit" name="company_class2limit">
                              <small class="form-text text-danger" id="error_company_class2limit"></small>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group form-group-default">
                              <label for="company_overtime" class="placeholder">Overtime Limit <span class="required">*</span></label>
                              <input type="text" class="form-control" id="company_overtime" name="company_overtime">
                              <small class="form-text text-danger" id="error_company_overtime"></small>
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
<?= $this->endSection() ?>
