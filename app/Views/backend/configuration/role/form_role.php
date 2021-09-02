<div class="card-body card-form">
    <form class="form-horizontal" id="form_role">
        <?= csrf_field(); ?>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">Name <span class="required">*</span></label>
                    <input type="text" class="form-control" id="name" name="name">
                    <small class="form-text text-danger" id="error_name"></small>
                </div>
                <div class="form-group">
                    <label for="description">Description </label>
                    <textarea type="text" class="form-control" id="description" name="description" rows="3"></textarea>
                </div>
            </div>
            <div class="col-md-6 mt-4">
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input active" id="isactive" name="isactive">
                        <span class="form-check-sign">Active</span>
                    </label>
                </div>
            </div>
            <div class="col-md-12 table-responsive">
                <div class="form-group">
                    <table class="table table-bordered table-hover tb_tree" id="table">
                        <thead>
                            <tr>
                                <th>Menu</th>
                                <th>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" name="viewAll">
                                            <span class="form-check-sign">View</span>
                                        </label>
                                    </div>
                                </th>
                                <th>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" name="createAll">
                                            <span class="form-check-sign">Create</span>
                                        </label>
                                    </div>
                                </th>
                                <th>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" name="updateAll">
                                            <span class="form-check-sign">Update</span>
                                        </label>
                                    </div>
                                </th>
                                <th>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" name="deleteAll">
                                            <span class="form-check-sign">Delete</span>
                                        </label>
                                    </div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($menu as $key => $row) : ?>
                                <tr data-node="treetable-<?= $key ?>">
                                    <td><?= $row->name; ?></td>
                                    <td>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="isview" data-menu="parent" value="<?= $row->sys_menu_id ?>">
                                                <span class="form-check-sign"></span>
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="iscreate" data-menu="parent" value="<?= $row->sys_menu_id ?>">
                                                <span class="form-check-sign"></span>
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="isupdate" data-menu="parent" value="<?= $row->sys_menu_id ?>">
                                                <span class="form-check-sign"></span>
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="isdelete" data-menu="parent" value="<?= $row->sys_menu_id ?>">
                                                <span class="form-check-sign"></span>
                                            </label>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Submenu -->
                                <?php foreach ($submenu as $key2 => $row2) : ?>
                                    <?php if ($row2->sys_menu_id == $row->sys_menu_id) { ?>
                                        <tr data-pnode="treetable-parent-<?= $key ?>">
                                            <td><?= $row2->name; ?></td>
                                            <td>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input" name="isview" data-menu="<?= $row->sys_menu_id ?>" value="<?= $row2->sys_submenu_id ?>">
                                                        <span class="form-check-sign"></span>
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input" name="iscreate" data-menu="<?= $row->sys_menu_id ?>" value="<?= $row2->sys_submenu_id ?>">
                                                        <span class="form-check-sign"></span>
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input" name="isupdate" data-menu="<?= $row->sys_menu_id ?>" value="<?= $row2->sys_submenu_id ?>">
                                                        <span class="form-check-sign"></span>
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input" name="isdelete" data-menu="<?= $row->sys_menu_id ?>" value="<?= $row2->sys_submenu_id ?>">
                                                        <span class="form-check-sign"></span>
                                                    </label>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                <?php endforeach; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </form>
</div>