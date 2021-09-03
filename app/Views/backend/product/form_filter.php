<div class="row filter_page">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body card-filter">
                <form class="form-horizontal" id="filter_product">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <select class="form-control select2" name="md_principal_id">
                                    <option value="0">All Principal</option>
                                    <?php foreach ($principal as $row) : ?>
                                        <option value="<?= $row->md_principal_id ?>"><?= $row->name ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <select class="form-control select2" name="category1">
                                    <option value="">All Categories</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <select class="form-control select2" name="category2">
                                    <option value="">All Categories 2</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <select class="form-control select2" name="category3">
                                    <option value="">All Categories 3</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <button type="button" class="btn btn-primary btn-sm btn-round ml-auto btn_filter" title="Filter">
                                    <i class="fas fa-search"></i> Filter
                                    <img alt="" class="spinning" />
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>