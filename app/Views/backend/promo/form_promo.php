<div class="card-body card-form">
    <form class="form-horizontal form_open" id="form_promo">
        <?= csrf_field(); ?>
        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    <label for="title">Title <span class="required">*</span></label>
                    <input type="text" class="form-control" id="title" name="title">
                    <small class="form-text text-danger" id="error_title"></small>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="content">Content <span class="required">*</span></label>
                    <textarea class="form-control" id="content" name="content" rows="3"></textarea>
                    <small class="form-text text-danger" id="error_content"></small>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="start_date">Posted Date <span class="required">*</span></label>
                            <input type="text" class="form-control datepicker" id="start_date" name="start_date">
                            <small class="form-text text-danger" id="error_start_date"></small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="end_date">End Date <span class="required">*</span></label>
                            <input type="text" class="form-control datepicker" id="end_date" name="end_date">
                            <small class="form-text text-danger" id="error_end_date"></small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="slug">Slug <span class="required">*</span></label>
                    <input type="text" class="form-control" id="slug" name="slug">
                    <small class="form-text text-danger" id="error_slug"></small>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="md_image_id">Picture</label>
                    <div class="input-file input-file-image">
                        <img class="img-upload-preview" width="120" height="120" src="http://placehold.it/100x100" alt="preview">
                        <input type="file" class="form-control form-control-file" id="md_image_id" name="md_image_id" accept="image/*">
                        <label for="uploadImg" class=" label-input-file btn btn-primary">Upload a Image</label>
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
