<div class="card-body card-form">
    <form class="form-horizontal" id="form_principal">
        <?= csrf_field(); ?>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">Name <span class="required">*</span></label>
                    <input type="text" class="form-control" id="name" name="name">
                    <small class="form-text text-danger" id="error_name"></small>
                </div>
                <div class="form-group">
                    <label for="url">Url <span class="required">*</span></label>
                    <input type="text" class="form-control" id="url" name="url">
                    <small class="form-text text-danger" id="error_url"></small>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea type="text" class="form-control" id="description" name="description" rows="3"></textarea>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="seqno">Sequence <span class="required">*</span></label>
                    <input type="text" class="form-control" id="seqno" name="seqno">
                    <small class="form-text text-danger" id="error_seqno_id"></small>
                </div>
                <div class="form-group">
                    <label>Image <span class="required">*</span></label>
                    <div class="form-upload-result">
                        <label class="col-md-6 form-result" id="logo-result">
                            <button type="button" class="close-img" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <img class="img-result" />
                        </label>
                    </div>
                    <div class="form-upload">
                        <label class="col-md-6 form-upload-foto" id="logo-upload">
                            <input type="file" class="control-upload-image" id="md_image_id" name="md_image_id" onchange="previewImage(this)" accept="image/jpeg, image/png"></input>
                            <img class="img-upload" src="<?= base_url('custom/image/cameraroll.png') ?>" />
                        </label>
                        <small class="form-upload-text text-muted">
                            File type (JPG, PNG), the maximum file size is <strong> 1 Mb</strong>
                        </small>
                        <small class="form-text text-danger" id="error_md_image_id"></small>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input active" id="isactive" name="isactive">
                        <label for="isactive" class="custom-control-label">Active</label>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
