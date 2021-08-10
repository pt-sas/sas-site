<div class="card-body card-form">
    <form class="form-horizontal" id="form_news">
        <?= csrf_field(); ?>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="title">Title <span class="required">*</span></label>
                    <input type="text" class="form-control" id="title" name="title">
                    <small class="form-text text-danger" id="error_title"></small>
                </div>
                <div class="form-group">
                    <label for="content">Content <span class="required">*</span></label>
                    <textarea class="form-control summernote" id="content" name="content" rows="3"></textarea>
                    <small class="form-text text-danger" id="error_content"></small>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="title_en">Title (English) <span class="required">*</span></label>
                    <input type="text" class="form-control" id="title_en" name="title_en">
                    <small class="form-text text-danger" id="error_title_en"></small>
                </div>
                <div class="form-group">
                    <label for="content_en">Content (English) <span class="required">*</span></label>
                    <textarea class="form-control summernote" id="content_en" name="content_en" rows="3"></textarea>
                    <small class="form-text text-danger" id="error_content_en"></small>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="news_date">News Date <span class="required">*</span></label>
                    <input type="text" class="form-control datepicker" id="news_date" name="news_date">
                    <small class="form-text text-danger" id="error_news_date"></small>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Image <span class="required">*</span></label>
                    <div class="form-upload-result">
                        <label class="col-md-6 form-result" id="news-result">
                            <button type="button" class="close-img" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <img class="img-result" />
                        </label>
                    </div>
                    <div class="form-upload">
                        <label class="col-md-6 form-upload-foto" id="news-upload">
                            <input type="file" class="control-upload-image" id="md_image_id" name="md_image_id" onchange="previewImage(this)" accept="image/jpeg, image/png"></input>
                            <img class="img-upload" src="<?= base_url('custom/image/cameraroll.png') ?>" />
                        </label>
                        <small class="form-upload-text text-muted">
                            File type (JPG, PNG), the maximum file size is <strong> 3 Mb</strong>
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