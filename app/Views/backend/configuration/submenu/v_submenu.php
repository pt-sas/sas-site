<?= $this->extend('backend/_partials/overview') ?>

<?= $this->section('content') ?>

<?= $this->include('backend/configuration/submenu/form_submenu'); ?>
<div class="card-body card-main">
  <table class="table table-bordered table-hover table-pointer tb_display table-md" style="width: 100%">
    <thead>
      <tr>
        <th>ID</th>
        <th>No</th>
        <th>Name</th>
        <th>Parent</th>
        <th>Url</th>
        <th>Sequence</th>
        <th>Icon</th>
        <th>Active</th>
        <th>Actions</th>
      </tr>
    </thead>
  </table>
</div>
<?= $this->endSection() ?>