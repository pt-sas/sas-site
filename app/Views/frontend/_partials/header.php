<!-- header -->
<header>
  <div class="container-fluid">
    <a href="javascript:void(0);" class="toggle">
      <img src="<?= base_url('adw/assets/images/hamburger.png') ?>" alt="">
    </a>
    <div class="lang">
      <a <?php if (session()->lang == 'en') { echo 'class="active"'; } ?> href="<?= site_url('en'); ?>">EN</a>
      <a <?php if (session()->lang == 'id') { echo 'class="active"'; } ?> href="<?= site_url('id'); ?>">ID</a>
    </div>
    <a href="<?= base_url('/') ?>" class="logo">
      <img src="<?= base_url('adw/assets/images/logo.png') ?>" alt="">
      <img src="<?= base_url('adw/assets/images/logo-text.png') ?>" alt="" class="d-none d-lg-inline-block">
    </a>
    <a href="javascript:void(0);" class="search">
      <img src="<?= base_url('adw/assets/images/search-header.png') ?>" alt="">
    </a>
    <!-- <a href="javascript:void(0);" onclick="window.open('https://www.tokopedia.com/ptsahabat', '_blank')" class="shop">
      SHOP
      <img src="<?= base_url('adw/assets/images/shopping-bag.svg') ?>" alt="">
    </a> -->
  </div>
  <div class="search-float">
    <input type="search" value="" class="form-control" placeholder="Search">
  </div>
</header>
