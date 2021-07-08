<div class="sidebar sidebar-style-2">
  <div class="sidebar-wrapper scrollbar scrollbar-inner">
    <div class="sidebar-content">
      <div class="user">
        <div class="avatar-sm float-left mr-2">
          <img src="<?= base_url('custom/image/undraw_profile_1.svg') ?>" alt="..." class="avatar-img rounded-circle">
        </div>
        <div class="info">
          <a href="#myProfile">
            <span>
              Anhar
              <span class="user-level">Administrator</span>
            </span>
          </a>
        </div>
      </div>
      <ul class="nav nav-primary">
        <li class="nav-item">
          <a href="<?= base_url ('/backend/dashboard') ?>">
            <i class="fas fa-tachometer-alt"></i>
            <p>Dashboard</p>
          </a>
        </li>
        <li class="nav-item">
          <a data-toggle="collapse" href="#collapsePages">
            <i class="fas fa-layer-group"></i>
            <p>Pages</p>
            <span class="caret"></span>
          </a>
          <div class="collapse" id="collapsePages">
            <ul class="nav nav-collapse">
              <li>
                <a href="<?= base_url ('/backend/about') ?>"><span class="sub-item">About Us</span></a>
              </li>
              <li>
                <a href="<?= base_url ('/backend/location') ?>"><span class="sub-item">Our Location</span></a>
              </li>
            </ul>
          </div>
        </li>
        <li class="nav-item">
          <a href="<?= base_url ('/backend/mailbox') ?>">
            <i class="fas fa-envelope"></i>
            <p>Mailbox</p>
          </a>
        </li>


        <li class="nav-section">
          <span class="sidebar-mini-icon">
            <i class="fa fa-ellipsis-h"></i>
          </span>
          <h4 class="text-section">Settings</h4>
        </li>
        <li class="nav-item">
          <a data-toggle="collapse" href="#collapseWebSettings">
            <i class="fas fa-cogs"></i>
            <p>Website Settings</p>
            <span class="caret"></span>
          </a>
          <div class="collapse" id="collapseWebSettings">
            <ul class="nav nav-collapse">
              <li>
                <a href="messages.html">
                  <span class="sub-item">Site Menus</span>
                </a>
              </li>
              <li>
                <a href="messages.html">
                  <span class="sub-item">Roles & Permissions</span>
                </a>
              </li>
              <li>
                <a href="<?= base_url ('/user') ?>">
                  <span class="sub-item">User</span>
                </a>
              </li>
            </ul>
          </div>
        </li>

      </ul>
    </div>
  </div>
</div>
