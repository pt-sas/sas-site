<form class="form-horizontal" id="form_submenu">
  <div class="box-body">
    <div class="form-group">
      <label for="subName">Name</label>
      <input type="text" class="form-control form-control-border" name="subName" id="subName">
      <span id="sub_name_error" class="text-danger"></span>
    </div>
    <div class="form-group">
      <label for="sub_url">Url</label>
      <input type="text" class="form-control form-control-border" name="sub_url" id="sub_url">
      <span id="sub_url_error" class="text-danger"></span>
    </div>
    <div class="form-group">
      <label for="sub_icon">Icon</label>
      <input type="text" class="form-control form-control-border" name="sub_icon" id="sub_icon">
      <span id="sub_icon_error" class="text-danger"></span>
    </div>
    <div class="form-group">
      <label for="id_menu">Menu</label>
      <select class="custom-select form-control-border" name="id_menu" id="id_menu">
        <option value="">No Selected</option>
        <?php foreach ($parent_menu as $value) : ?>
          <option value="<?php echo $value->menus_id ?>"><?php echo $value->menus_name ?></option>
        <?php endforeach;?>
      </select>
      <span id="id_menus_error" class="text-danger"></span>
    </div>
    <div class="form-group">
      <label for="sub_line">Line No</label>
      <input type="number" class="form-control form-control-border" name="sub_line" id="sub_line">
      <span id="sub_line_error" class="text-danger"></span>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <div class="checkbox">
          <label>
            <input type="checkbox" id="sub_cb"> Active
            <input type="hidden" name="sub_isactive" id="sub_isactive" value="Y">
          </label>
        </div>
      </div>
    </div>
    <input type="hidden" name="id_submenu" class="form-control" readonly>
  </div>
  <!-- /.box-body -->
</form>
