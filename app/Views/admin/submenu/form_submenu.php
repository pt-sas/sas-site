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
                <form class="form-horizontal form_open" id="form_submenu">
                    <?= csrf_field(); ?>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="sub_name">Menu <span class="required">*</span></label>
                                    <input type="text" class="form-control" id="sub_name" name="sub_name" placeholder="Enter menu name">
                                    <small class="form-text text-danger" id="error_sub_name"></small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="sub_status">Status <span class="required">*</span></label>
                                    <select class="form-control select2" id="sub_status" name="sub_status">
                                        <option value="">--Select Menu</option>
                                        <option value="F">Front End</option>
                                        <option value="B">Back End</option>
                                    </select>
                                    <small id="error_sub_status" class="form-text text-danger"></small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input active" id="sub_isactive" name="sub_isactive">
                                    <label for="sub_isactive" class="custom-control-label">Active</label>
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