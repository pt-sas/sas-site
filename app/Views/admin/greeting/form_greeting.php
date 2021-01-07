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
                <form class="form-horizontal form_open" id="form_greeting">
                    <?= csrf_field(); ?>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="gre_name">Name <span class="required">*</span></label>
                                    <input type="text" class="form-control" id="gre_name" name="gre_name" placeholder="Enter bank name">
                                    <small class="form-text text-danger" id="error_gre_name"></small>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="gre_desc">Description</label>
                                    <textarea class="form-control" id="gre_desc" name="gre_desc" rows="2"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input active" id="gre_isactive" name="gre_isactive">
                                    <label for="gre_isactive" class="custom-control-label">Active</label>
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