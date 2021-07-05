<?= $this->extend('backend/_partials/overview') ?>

<?= $this->section('content') ?>
<div class="row">
  <div class="col-sm-12">
    <div class="card card-primary card-outline card-outline-tabs">

      <div class="card-body">
        <div class="tab-content" id="custom-tabs-four-tabContent">
          <div class="tab-pane fade show active" id="custom-tabs-four-profile" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
            <div class="box-header">
                <button type="submit" class="btn btn-primary" onclick="addUser()">Add New</button>
            </div>
            <div class="box-body">
              <table id="table-user" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Username</th>
                    <th>Full Name</th>
                    <th>Group User</th>
                    <th>Status</th>
                    <th>Last Login</th>
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
