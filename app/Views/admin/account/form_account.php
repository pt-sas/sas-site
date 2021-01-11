<div class="modal fade modal_form form">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"></h4>
                <button type="button" class="close x_form" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal form_open" id="form_account">
                    <?= csrf_field(); ?>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="acc_name">Name <span class="required">*</span></label>
                                    <input type="text" class="form-control" id="acc_name" name="acc_name" placeholder="Enter name">
                                    <small class="form-text text-danger" id="error_acc_name"></small>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="acc_bank">Bank <span class="required">*</span></label>
                                    <select type="text" class="form-control select2" id="acc_bank" name="acc_bank">
                                        <option value=""></option>
                                    </select>
                                    <small class="form-text text-danger" id="error_acc_bank"></small>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="acc_accountno">Account No <span class="required">*</span></label>
                                    <input type="text" class="form-control number" id="acc_accountno" name="acc_accountno">
                                    <small class="form-text text-danger" id="error_acc_accountno"></small>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="acc_branch">Branch </span></label>
                                    <input type="text" class="form-control" id="acc_branch" name="acc_branch">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="acc_desc">Description</label>
                                    <textarea class="form-control" id="acc_desc" name="acc_desc" rows="2"></textarea>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input active" id="acc_isactive" name="acc_isactive">
                                        <label for="acc_isactive" class="custom-control-label">Active</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="acc_isdefault" name="acc_isdefault">
                                        <label for="acc_isdefault" class="custom-control-label">Default</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-danger close_form" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-outline-primary save_form">Save changes</button>
            </div>
        </div>
    </div>
</div>