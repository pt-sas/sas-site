<div class="modal fade" id="modal_menu">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Default Modal</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php $this->load->view('backend/configuration/menu/formMenu') ?>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-danger" data-dismiss="modal" id="btn_closeMenu" onclick="resetMenu()">Close</button>
        <button type="submit" class="btn btn-primary" onclick="saveMenu()" id="btn_saveMenu"><i class="fa fa-save"></i> Save</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<div class="modal fade" id="modal_submenu">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php $this->load->view('backend/configuration/menu/formSub') ?>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-danger" data-dismiss="modal" id="btn_closeSub" onclick="resetSubmenu()">Close</button>
        <button type="submit" class="btn btn-primary"onclick="saveSubmenu()" id="btn_saveSub"><i class="fa fa-save"></i> Save</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
