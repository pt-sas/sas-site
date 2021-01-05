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
                <form class="form-horizontal form_open" id="form_product">
                    <?= csrf_field(); ?>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="pro_code">Code Product <span class="required">*</span></label>
                                    <input type="text" class="form-control" id="pro_code" name="pro_code" placeholder="Enter code product">
                                    <small class="form-text text-danger" id="error_pro_code"></small>
                                </div>
                                <div class="form-group">
                                    <label for="pro_name">Product <span class="required">*</span></label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="pro_name" name="pro_name" placeholder="Enter product name">
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-tshirt"></i></span>
                                        </div>
                                    </div>
                                    <small class="form-text text-danger" id="error_pro_name"></small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Image Product</label>
                                    <div id="form-upload-result">
                                        <label class="form-result col-md-6">
                                            <button type="button" class="close-img" id="btn_delimg" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </label>
                                    </div>
                                    <div id="form-upload">
                                        <label class="form-upload-foto col-md-6">
                                            <input type="file" id="pro_image" name="pro_image" accept="image/jpeg, image/png"></input>
                                            <img class="img-upload" src="<?= base_url('assets/dist/img/cameraroll.png') ?>" />
                                        </label>
                                        <small class="form-upload-text text-muted">
                                            Tipe file (JPG, PNG), Maksimal ukuran file adalah <strong> 5 Mb</strong>
                                        </small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="pro_desc">Description</label>
                                    <textarea class="form-control" id="pro_desc" name="pro_desc" rows="2"></textarea>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group mt-4">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input active" id="pro_isactive" name="pro_isactive">
                                        <label for="pro_isactive" class="custom-control-label">Active</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group mt-4">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input visible" id="pro_visible" name="pro_visible">
                                        <label for="pro_visible" class="custom-control-label">Visible</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="pro_qty">Quantity <span class="required">*</span></label>
                                    <input type="text" class="form-control number" id="pro_qty" name="pro_qty">
                                    <small class="form-text text-danger" id="error_pro_qty"></small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="pro_uom">UOM</label>
                                    <select class="form-control select2" id="pro_uom" name="pro_uom"></select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="pro_group">Product Group <span class="required">*</span></label>
                                    <select class="form-control select2" id="pro_group" name="pro_group">
                                        <option value="1">Tos</option>
                                        <option value="2">Test</option>
                                        <option value="3">Tas</option>
                                    </select>
                                    <small class="form-text text-danger" id="error_pro_group"></small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="pro_principal">Principal </label>
                                    <select class="form-control select2" id="pro_principal" name="pro_principal"></select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="pro_weight">Weight (gram) <span class="required">*</span></label>
                                    <div class="input-group">
                                        <input type="text" class="form-control number" id="pro_weight" name="pro_weight">
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-weight-hanging"></i></span>
                                        </div>
                                    </div>
                                    <small class="form-text text-muted msg">
                                        Satuan <strong>gram</strong>, berat 1 kg: <strong>1000 gram</strong>
                                    </small>
                                    <small class="form-text text-danger" id="error_pro_weight"></small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="pro_height">Height <span class="required">*</span></label>
                                    <input type="text" class="form-control" id="pro_height" name="pro_height">
                                    <small class="form-text text-danger" id="error_pro_height"></small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="pro_width">Width <span class="required">*</span></label>
                                    <input type="text" class="form-control" id="pro_width" name="pro_width">
                                    <small class="form-text text-danger" id="error_pro_width"></small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="pro_depth">Depth <span class="required">*</span></label>
                                    <input type="text" class="form-control" id="pro_depth" name="pro_depth">
                                    <small class="form-text text-danger" id="error_pro_depth"></small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="pro_volume">Volume <span class="required">*</span></label>
                                    <input type="text" class="form-control" id="pro_volume" name="pro_volume">
                                    <small class="form-text text-danger" id="error_pro_volume"></small>
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