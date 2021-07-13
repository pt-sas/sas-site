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
            <li class="breadcrumb-item"><a href="<?= base_url('/news') ?>">News & Promo</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $news->title ?></li>
          </ol>
          <h4><?= $news->title ?></h4>
          <small>Published <?= date("d F Y", strtotime($news->news_date)) ?></small>
          <div class="image my-4" style="background-image: url('<?= base_url($news->image_url) ?>');"></div>
          <?= $news->content ?>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <footer>
        <p>© Copyright 2021 PT. Sahabat Abadi Sejahtera - All rights reserved.</p>
        <a href="" class="foot-socmed"><i class="fa fa-facebook-f"></i></a>
        <a href="" class="foot-socmed"><i class="fa fa-twitter"></i></a>
        <a href="" class="foot-socmed"><i class="fa fa-instagram"></i></a>
      </footer>
    </div>
  </div>
</div>
<?= $this->endSection() ?>
