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
                <form class="form-horizontal form_open" id="form_menu">
                    <?= csrf_field(); ?>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="mnu_name">Name <span class="required">*</span></label>
                                    <input type="text" class="form-control" id="mnu_name" name="mnu_name" placeholder="Enter menu name">
                                    <small class="form-text text-danger" id="error_mnu_name"></small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="mnu_status">Status <span class="required">*</span></label>
                                    <select class="form-control select2" id="mnu_status" name="mnu_status">
                                        <option value="">--Select Menu</option>
                                        <option value="F">Front End</option>
                                        <option value="B">Back End</option>
                                    </select>
                                    <small class="form-text text-danger" id="error_mnu_status"></small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="mnu_icon">Icon </label>
                                    <input type="text" class="form-control" id="mnu_icon" name="mnu_icon" placeholder="fas fa-icon">
                                </div>
                            </div>   
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="mnu_sequence">Sequence <span class="required">*</span></label>
                                    <input type="text" class="form-control number" id="mnu_sequence" name="mnu_sequence">
                                    <small class="form-text text-danger" id="error_mnu_sequence"></small>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="mnu_url">Url <span class="required">*</span></label>
                                    <input type="text" class="form-control" id="mnu_url" name="mnu_url">
                                    <small class="form-text text-danger" id="error_mnu_url"></small>
                                </div>
                            </div>                           
                            <div class="col-md-6">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input active" id="mnu_isactive" name="mnu_isactive">
                                    <label for="mnu_isactive" class="custom-control-label">Active</label>
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