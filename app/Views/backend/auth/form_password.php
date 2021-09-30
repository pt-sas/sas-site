<div class="modal fade modal_form">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Change Password</h4>
                <button type="button" class="close x_form" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" id="form_password">
                    <div class="form-group row">
                        <label for="password" class="col-sm-5 col-form-label">Old Password</label>
                        <div class="col-sm-7">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Input your old password">
                            <small class="form-text text-danger" id="error_password"></small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="new_password" class="col-sm-5 col-form-label">New Password</label>
                        <div class="col-sm-7">
                            <input type="password" class="form-control" id="new_password" name="new_password" placeholder="Input your new password">
                            <small class="for-text text-danger" id="error_new_password"></small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="conf_password" class="col-sm-5 col-form-label">Confirmation Password</label>
                        <div class="col-sm-7">
                            <input type="password" class="form-control" id="conf_password" name="conf_password" placeholder="Input confirmation password">
                            <small class="form-text text-danger" id="error_conf_password"></small>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-danger btn-round close_form" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary btn-round save_form_pass">Save changes</button>
            </div>
        </div>
    </div>
</div>