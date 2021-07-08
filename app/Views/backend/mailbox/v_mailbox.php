<?= $this->extend('backend/_partials/overview') ?>

<?= $this->section('content'); ?>
<div class="page-with-aside mail-wrapper bg-white">
  <div class="page-aside bg-grey1">
    <div class="aside-header">
      <div class="title">Mail Service</div>
      <div class="description">Service Description</div>
      <a class="btn btn-primary toggle-email-nav" data-toggle="collapse" href="#email-app-nav" role="button" aria-expanded="false" aria-controls="email-nav">
        <span class="btn-label">
          <i class="icon-menu"></i>
        </span>
        Menu
      </a>
    </div>
    <div class="aside-nav collapse" id="email-app-nav">
      <ul class="nav">
        <li class="active">
          <a href="#">
            <i class="flaticon-inbox"></i> Inbox
            <span class="badge badge-primary float-right">8</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class="fa fa-envelope"></i> Sent Mail
          </a>
        </li>
        <li>
          <a href="#">
            <i class="flaticon-envelope-3"></i> Drafts
          </a>
        </li>
        <li>
          <a href="#">
            <i class="flaticon-interface-5"></i> Trash
          </a>
        </li>

      </ul>
      <div class="aside-compose"><a href="#" class="btn btn-primary btn-block fw-mediumbold">Compose Email</a></div>
    </div>
  </div>
  <div class="page-content mail-content">
    <div class="inbox-head d-lg-flex d-block">
      <h3>Inbox</h3>
      <form action="#" class="ml-auto">
        <div class="input-group">
          <input type="text" placeholder="Search Email" class="form-control">
          <div class="input-group-append">
            <span class="input-group-text">
              <i class="fa fa-search search-icon"></i>
            </span>
          </div>
        </div>
      </form>
    </div>
    <div class="inbox-body">
      <div class="mail-option">
        <div class="email-filters-left">
          <div class="chk-all">
            <div class="btn-group">
              <div class="form-check">
                <label class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input"><span class="custom-control-label"></span>
                </label>
              </div>
            </div>
          </div>
          <div class="btn-group">
            <button data-toggle="dropdown" type="button" class="btn btn-secondary btn-border dropdown-toggle"> With selected </button>
            <div role="menu" class="dropdown-menu"><a href="#" class="dropdown-item">Mark as read</a><a href="#" class="dropdown-item">Mark as unread</a><a href="#" class="dropdown-item">Spam</a>
              <div class="dropdown-divider"></div><a href="#" class="dropdown-item">Delete</a>
            </div>
          </div>
          <div class="btn-group">
            <button type="button" class="btn btn-secondary btn-border">Archive</button>
            <button type="button" class="btn btn-secondary btn-border">Delete</button>
          </div>
          <div class="btn-group">
            <button data-toggle="dropdown" type="button" class="btn btn-secondary btn-border dropdown-toggle" aria-expanded="false">Order by </button>
            <div role="menu" class="dropdown-menu dropdown-menu-right"><a href="#" class="dropdown-item">Date</a><a href="#" class="dropdown-item">From</a>
            </div>
          </div>
        </div>

        <div class="email-filters-right ml-auto"><span class="email-pagination-indicator">1-50 of 213</span>
          <div class="btn-group ml-3">
            <button type="button" class="btn btn-secondary btn-border"><i class="fa fa-angle-left"></i></button>
            <button type="button" class="btn btn-secondary btn-border"><i class="fa fa-angle-right"></i></button>
          </div>
        </div>
      </div>

      <div class="email-list">
        <div class="email-list-item unread">
          <div class="email-list-actions">
            <div class="d-flex">
              <label class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input"><span class="custom-control-label"></span>
              </label>
              <span class="rating rating-sm mr-3">
                <input type="checkbox" id="star1" value="1">
                <label for="star1">
                  <span class="fa fa-star"></span>
                </label>
              </span>
            </div>
          </div>
          <div class="email-list-detail">
            <span class="date float-right"><i class="fa fa-paperclip paperclip"></i> 28 Jul</span><span class="from">Google Webmaster</span>
            <p class="msg">Improve the search presence of WebSite</p>
          </div>
        </div>
        <div class="email-list-item unread">
          <div class="email-list-actions">
            <div class="d-flex">
              <label class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input"><span class="custom-control-label"></span>
              </label>
              <span class="rating rating-sm mr-3">
                <input type="checkbox" id="star2" value="1" checked>
                <label for="star2">
                  <span class="fa fa-star"></span>
                </label>
              </span>
            </div>
          </div>
          <div class="email-list-detail"><span class="date float-right"></span><span class="date float-right"><i class="fa fa-paperclip paperclip"></i> 13 Jul</span><span class="from">	PHPClass</span>
            <p class="msg">Learn Laravel Videos Tutorial</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>
