<?= $this->extend('frontend/_partials/overview') ?>

<?= $this->section('content') ?>

<!-- hero -->
<div class="content">

  <!-- news detail -->
  <div class="news-detail-wrap">
    <div class="container">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('/') ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('/news') ?>">News & Promo</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $news->title ?></li>
          </ol>
          <h4><?= $news->title ?></h4>
          <div class="image" style="background-image: url('<?= base_url('adw/assets/images/news-big.png') ?>');"></div>
          <?= $news->content ?>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <?= $this->include('frontend/_partials/footer'); ?>
    </div>
  </div>
</div>
<?= $this->endSection() ?>