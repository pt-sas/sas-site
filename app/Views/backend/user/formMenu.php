<form class="form-horizontal" id="form_menu">
  <div class="box-body">
    <div class="form-group">
      <label for="menuName">Name</label>
      <input type="text" class="form-control form-control-border" name="menuName" id="menuName">
      <span id="name_error" class="text-danger"></span>
    </div>
    <div class="form-group">
      <label for="menuName">Url</label>
      <input type="text" class="form-control form-control-border" name="url" id="url">
      <span id="url_error" class="text-danger"></span>
    </div>
    <div class="form-group">
      <label for="icon">Icon</label>
      <input type="text" class="form-control form-control-border" name="icon" id="icon">
      <span id="icon_error" class="text-danger"></span>
    </div>
    <div class="form-group">
      <label for="line">Line No</label>
      <input type="number" class="form-control form-control-border" name="line" id="line">
      <span id="lineno_error" class="text-danger"></span>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <div class="checkbox">
          <label>
            <input type="checkbox" id="menus_cb"> Active
            <input type="hidden" name="menus_isactive" id="menus_isactive" value="Y">
          </label>
        </div>
      </div>
    </div>
    <input type="hidden" name="id_menu" class="form-control" readonly>
  </div>
  <!-- /.box-body -->
</form>
