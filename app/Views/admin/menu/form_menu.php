<div class="modal fade modal_form">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" id="form_menu">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="pro_code">Code Product <span class="required">*</span></label>
                                    <input type="text" class="form-control" id="pro_code" name="pro_code" placeholder="Enter code product">
                                    <small id="error_pro_code" class="form-text text-danger"></small>
                                </div>
                                <div class="form-group">
                                    <label for="pro_name">Product <span class="required">*</span></label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="pro_name" name="pro_name" placeholder="Enter product name">
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-tshirt"></i></span>
                                        </div>
                                    </div>
                                    <small id="error_pro_name" class="form-text text-danger"></small>
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