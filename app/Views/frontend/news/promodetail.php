<?= $this->extend('frontend/_partials/overview') ?>

<?= $this->section('content') ?>

<!-- hero -->
<div class="content">

  <!-- news detail -->
  <div class="news-detail-wrap">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('/news') ?>">News & Promo</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $promo->title ?></li>
          </ol>
        </div>
      </div>
      <div class="row my-4">
        <div class="col-md-4">
          <div class="image" style="background-image: url('<?= base_url($promo->image_url) ?>');"></div>
        </div>
        <div class="col-md-8">
          <h4><?= $promo->title ?></h4>
          <h6>Period: <?= date("d F Y", strtotime($promo->start_date)) ?> - <?= date("d F Y", strtotime($promo->end_date)) ?></h6>
          <hr>
          <?= $promo->content ?>
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
