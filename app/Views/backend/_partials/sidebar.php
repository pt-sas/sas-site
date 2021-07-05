<div class="sidebar sidebar-style-2">
  <div class="sidebar-wrapper scrollbar scrollbar-inner">
    <div class="sidebar-content">
      <div class="user">
        <div class="avatar-sm float-left mr-2">
          <img src="<?= base_url('custom/image/undraw_profile_1.svg') ?>" alt="..." class="avatar-img rounded-circle">
        </div>
        <div class="info">
          <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
            <span>
              Anhar
              <span class="user-level">Administrator</span>
              <span class="caret"></span>
            </span>
          </a>
          <div class="clearfix"></div>

          <div class="collapse in" id="collapseExample">
            <ul class="nav">
              <li>
                <a href="#profile">
                  <span class="link-collapse">My Profile</span>
                </a>
              </li>
              <li>
                <a href="#edit">
                  <span class="link-collapse">Edit Profile</span>
                </a>
              </li>
              <li>
                <a href="#settings">
                  <span class="link-collapse">Settings</span>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <ul class="nav nav-primary">
        <li class="nav-item">
          <a href="<?= base_url ('/') ?>">
            <i class="fas fa-tachometer-alt"></i>
            <p>Dashboard</p>
          </a>
        </li>
        <li class="nav-section">
          <span class="sidebar-mini-icon">
            <i class="fa fa-ellipsis-h"></i>
          </span>
          <h4 class="text-section">Components</h4>
        </li>
        <li class="nav-item">
          <a data-toggle="collapse" href="#collapseMasterData">
            <i class="fas fa-layer-group"></i>
            <p>Master Data</p>
            <span class="caret"></span>
          </a>
          <div class="collapse" id="collapseMasterData">
            <ul class="nav nav-collapse">
              <li>
                <a href="<?= base_url ('/company') ?>"><span class="sub-item">Company Profile</span></a>
              </li>
              <li>
                <a href="<?= base_url ('/workingdays') ?>"><span class="sub-item">Working Days</span></a>
              </li>
              <li>
                <a href="<?= base_url ('/holiday') ?>"><span class="sub-item">Holiday</span></a>
              </li>
              <li>
                <a href="<?= base_url ('/leavetype') ?>"><span class="sub-item">Leave Type</span></a>
              </li>
              <li>
                <a href="<?= base_url ('/massleave') ?>"><span class="sub-item">Mass Leave</span></a>
              </li>
              <hr>
              <li>
                <a href="<?= base_url ('/region') ?>"><span class="sub-item">Region</span></a>
              </li>
              <li>
                <a href="<?= base_url ('/branch') ?>"><span class="sub-item">Branch</span></a>
              </li>
              <li>
                <a href="<?= base_url ('/division') ?>"><span class="sub-item">Division</span></a>
              </li>
              <hr>
              <li>
                <a href="<?= base_url ('/religion') ?>"><span class="sub-item">Religion</span></a>
              </li>
              <li>
                <a href="<?= base_url ('/bloodtype') ?>"><span class="sub-item">Blood Type</span></a>
              </li>
              <li>
                <a href="<?= base_url ('/position') ?>"><span class="sub-item">Position</span></a>
              </li>
              <li>
                <a href="<?= base_url ('/employeestatus') ?>"><span class="sub-item">Employee Status</span></a>
              </li>
            </ul>
          </div>
        </li>
        <li class="nav-item">
          <a href="<?= base_url ('/') ?>">
            <i class="fas fa-user-friends"></i>
            <p>Employee</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= base_url ('/user') ?>">
            <i class="fas fa-user-plus"></i>
            <p>User</p>
          </a>
        </li>

        <li class="nav-section">
          <span class="sidebar-mini-icon">
            <i class="fa fa-ellipsis-h"></i>
          </span>
          <h4 class="text-section">Administration</h4>
        </li>
        <li class="nav-item">
          <a data-toggle="collapse" href="#collapseForm">
            <i class="far fa-paper-plane"></i>
            <p>Leave</p>
            <span class="caret"></span>
          </a>
          <div class="collapse" id="collapseForm">
            <ul class="nav nav-collapse">
              <li>
                <a href="messages.html">
                  <span class="sub-item">Absence</span>
                </a>
              </li>
              <li>
                <a href="messages.html">
                  <span class="sub-item">Report Absence</span>
                </a>
              </li>
              <li>
                <a href="messages.html">
                  <span class="sub-item">Overtime</span>
                </a>
              </li>
              <li>
                <a href="messages.html">
                  <span class="sub-item">Report Overtime</span>
                </a>
              </li>
            </ul>
          </div>
        </li>


        <li class="nav-section">
          <span class="sidebar-mini-icon">
            <i class="fa fa-ellipsis-h"></i>
          </span>
          <h4 class="text-section">Compensation & Benefit</h4>
        </li>
        <li class="nav-item">
          <a data-toggle="collapse" href="#collapseTimeManagement">
            <i class="far fa-clock"></i>
            <p>Time Management</p>
            <span class="caret"></span>
          </a>
          <div class="collapse" id="collapseTimeManagement">
            <ul class="nav nav-collapse">
              <li>
                <a href="messages.html">
                  <span class="sub-item">Time Management</span>
                </a>
              </li>
            </ul>
          </div>
        </li>
        <li class="nav-item">
          <a data-toggle="collapse" href="#collapsePayroll">
            <i class="fas fa-file-invoice-dollar"></i>
            <p>Payroll</p>
            <span class="caret"></span>
          </a>
          <div class="collapse" id="collapsePayroll">
            <ul class="nav nav-collapse">
              <li>
                <a href="messages.html">
                  <span class="sub-item">Payroll</span>
                </a>
              </li>
              <li>
                <a href="messages.html">
                  <span class="sub-item">BPJS</span>
                </a>
              </li>
              <li>
                <a href="messages.html">
                  <span class="sub-item">THR</span>
                </a>
              </li>
              <li>
                <a href="messages.html">
                  <span class="sub-item">Report Payroll</span>
                </a>
              </li>
            </ul>
          </div>
        </li>
        <li class="nav-item">
          <a href="<?= base_url ('/user') ?>">
            <i class="fas fa-file-signature"></i>
            <p>Loan Management</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= base_url ('/user') ?>">
            <i class="fas fa-file-signature"></i>
            <p>Medical Management</p>
          </a>
        </li>


        <li class="nav-section">
          <span class="sidebar-mini-icon">
            <i class="fa fa-ellipsis-h"></i>
          </span>
          <h4 class="text-section">People Development</h4>
        </li>
        <li class="nav-item">
          <a data-toggle="collapse" href="#collapsePeople">
            <i class="fas fa-hands-helping"></i>
            <p>People Development</p>
            <span class="caret"></span>
          </a>
          <div class="collapse" id="collapsePeople">
            <ul class="nav nav-collapse">
              <li>
                <a href="messages.html">
                  <span class="sub-item">Performance & Competency</span>
                </a>
              </li>
              <li>
                <a href="messages.html">
                  <span class="sub-item">Training Management</span>
                </a>
              </li>
            </ul>
          </div>
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
            </ul>
          </div>
        </li>

      </ul>
    </div>
  </div>
</div>
