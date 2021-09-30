<nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue2">

  <div class="container-fluid">
    <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
      <li class="nav-item dropdown hidden-caret">
        <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
          <div class="avatar-sm">
            <img src="<?= base_url('custom/image/undraw_profile_1.svg') ?>" alt="..." class="avatar-img rounded-circle">
          </div>
        </a>
        <ul class="dropdown-menu dropdown-user animated fadeIn">
          <div class="dropdown-user-scroll scrollbar-outer">
            <li>
              <div class="user-box">
                <div class="avatar-lg"><img src="<?= base_url('custom/image/undraw_profile_1.svg') ?>" alt="image profile" class="avatar-img rounded"></div>
                <div class="u-text">
                  <h4><?= $name; ?></h4>
                  <p class="text-muted"><?= $email; ?></p>
                </div>
              </div>
            </li>
            <li>
              <div class="dropdown-divider"></div>
              <!-- <a class="dropdown-item" href="#">My Profile</a>
              <a class="dropdown-item" href="#">Inbox</a>
              <div class="dropdown-divider"></div> -->
              <a class="dropdown-item change-password" href="javascript:void(0)"><i class="fas fa-cog"></i> Change Password</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="<?= site_url('logout') ?>"><i class="fas fa-sign-out-alt"></i> Logout</a>
            </li>
          </div>
        </ul>
      </li>
    </ul>
  </div>
</nav>