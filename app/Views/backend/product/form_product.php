<div class="card-body card-form">
    <form class="form-horizontal" id="form_news">
        <?= csrf_field(); ?>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="code">Code <span class="required">*</span></label>
                    <input type="text" class="form-control" id="code" name="code">
                    <small class="form-text text-danger" id="error_code"></small>
                </div>
                <div class="form-group">
                    <label for="name">Name <span class="required">*</span></label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="e.g: TL-D 18W/33">
                    <small class="form-text text-danger" id="error_name"></small>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Product Image<span class="required">*</span></label>
                    <div class="form-upload-result">
                        <label class="col-md-6 form-result" id="product-result">
                            <button type="button" class="close-img" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <img class="img-result" />
                        </label>
                    </div>
                    <div class="form-upload">
                        <label class="col-md-6 form-upload-foto" id="product-upload">
                            <input type="file" class="control-upload-image" id="url" name="url" onchange="previewImage(this)" accept="image/jpeg, image/png"></input>
                            <img class="img-upload" src="<?= base_url('custom/image/cameraroll.png') ?>" />
                        </label>
                        <small class="form-upload-text text-muted">
                            File type (JPG, PNG), the maximum file size is <strong> 3 Mb</strong>
                        </small>
                        <small class="form-text text-danger" id="error_url"></small>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="m_product_id">iDempiere Code <span class="required">*</span></label>
                    <input type="text" class="form-control" id="m_product_id" name="m_product_id" placeholder="e.g: AA0101000">
                    <small class="form-text text-danger" id="error_m_product_id"></small>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="md_uom_id">UOM <span class="required">*</span></label>
                    <select class="form-control select2" id="md_uom_id" name="md_uom_id">
                        <option value="">Select Uom</option>
                        <?php foreach ($uom as $row) : ?>
                            <option value="<?= $row->md_uom_id ?>" <?= $row->md_uom_id = 1 ? "selected" : "" ?>><?= $row->name ?></option>
                        <?php endforeach; ?>
                    </select>
                    <small class="form-text text-danger" id="error_md_uom_id"></small>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="md_principal_id">Principal <span class="required">*</span></label>
                    <select class="form-control select2 main-select" id="md_principal_id" name="md_principal_id">
                        <option value="">Select Principal</option>
                        <?php foreach ($principal as $row) : ?>
                            <option value="<?= $row->md_principal_id ?>"><?= $row->name ?></option>
                        <?php endforeach; ?>
                    </select>
                    <small class="form-text text-danger" id="error_md_principal_id"></small>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="category1">Category 1 </label>
                    <select class="form-control select2" id="category1" name="category1"></select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="category2">Category 2 </label>
                    <select class="form-control select2" id="category2" name="category2"></select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="category3">Category 3 </label>
                    <select class="form-control select2" id="category3" name="category3"></select>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="description">Content <span class="required">*</span></label>
                    <textarea class="form-control summernote-product" id="description" name="description" rows="3"></textarea>
                    <small class="form-text text-danger" id="error_description"></small>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="color">Color </label>
                    <input type="text" class="form-control" id="color" name="color">
                </div>
                <div class="form-group">
                    <label for="height">Height </label>
                    <input type="text" class="form-control float-number" id="height" name="height">
                    <small class="form-text text-danger" id="error_height"></small>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="weight">Weight (gram) </label>
                    <input type="text" class="form-control float-number" id="weight" name="weight">
                    <small class="form-text text-danger" id="error_weight"></small>
                </div>
                <div class="form-group">
                    <label for="depth">Depth </label>
                    <input type="text" class="form-control float-number" id="depth" name="depth">
                    <small class="form-text text-danger" id="error_depth"></small>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="width">Width </label>
                    <input type="text" class="form-control float-number" id="width" name="width">
                    <small class="form-text text-danger" id="error_width"></small>
                </div>
                <div class="form-group">
                    <label for="volume">Volume </label>
                    <input type="text" class="form-control float-number" id="volume" name="volume">
                    <small class="form-text text-danger" id="error_volume"></small>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="url_toped">URL Tokopedia </label>
                    <input type="text" class="form-control" id="url_toped" name="url_toped">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="url_shopee">URL Shopee </label>
                    <input type="text" class="form-control" id="url_shopee" name="url_shopee">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="url_jdid">URL JD.ID </label>
                    <input type="text" class="form-control" id="url_jdid" name="url_jdid">
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input active" id="isactive" name="isactive">
                        <span class="form-check-sign">Active</span>
                    </label>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" id="visible" name="visible">
                        <span class="form-check-sign">Visible</span>
                    </label>
                </div>
            </div>
        </div>
    </form>
</div>