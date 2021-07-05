<?= $this->extend('backend/_partials/overview') ?>

<?= $this->section('content') ?>
<div class="row">
  <div class="col-sm-12">
    <div class="card card-primary card-outline card-outline-tabs">
      <div class="card-header p-0 border-bottom-0">
        <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">Menu</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false">Submenu</a>
          </li>
        </ul>
      </div>

      <div class="card-body">
        <div class="tab-content" id="custom-tabs-four-tabContent">
          <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
            <div class="box-header">
                <button type="submit" class="btn btn-primary" onclick="addMenu()">Add New</button>
            </div>
            <div class="box-body">
              <table id="table-menu" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Menu Name</th>
                    <th>Line No</th>
                    <th>Url</th>
                    <th>Icon</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
            <div class="box-header">
                <button type="submit" class="btn btn-primary" onclick="addSubmenu()">Add New</button>
            </div>
            <div class="box-body">
              <table id="table-submenu" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Submenu Name</th>
                    <th>Line No</th>
                    <th>Url Submenu</th>
                    <th>Icon Submenu</th>
                    <th>Menu Parent</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
              </table>
            </div>
          </div>
        </div>
      </div>
      <!-- /.card-body -->
    </div>
  </div>
</div>
<?= $this->endSection() ?>
