<div class="sidebar sidebar-style-2">
  <div class="sidebar-wrapper scrollbar scrollbar-inner">
    <div class="sidebar-content">
      <div class="user">
        <div class="avatar-sm float-left mr-2">
          <img src="<?= base_url('custom/image/undraw_profile_1.svg') ?>" alt="..." class="avatar-img rounded-circle">
        </div>
        <div class="info">
          <a href="<?= site_url('panel') ?>">
            <span>
              <?= $username; ?>
              <span class="user-level"><?= $level; ?></span>
            </span>
          </a>
        </div>
      </div>
      <?= $sidebar; ?>
    </div>
  </div>
</div>