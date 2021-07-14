<?= $this->extend('frontend/_partials/overview') ?>

<?= $this->section('content') ?>

<!-- hero -->
<div class="content">
  <div class="title-page">
    News & Promo
  </div>

  <!-- news  -->
  <div class="news-page-wrap">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h5 class="sec-title">News</h5>
        </div>
        <?php foreach($news as $row): ?>
          <div class="col-md-4">
            <a href="<?= base_url('/news/'.$row->slug.'') ?>" class="item-news">
              <div class="image" style="background-image: url('<?= base_url($row->image_url) ?>');"></div>
              <h5><?= $row->title;?></h5>
              <span><?= date("d F Y", strtotime($row->news_date)) ?></span>
            </a>
          </div>
        <?php endforeach;?>
      </div>
    </div>
  </div>

  <!-- promo -->
  <div class="promo-wrap bordered-top">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h5 class="sec-title">Promo</h5>
        </div>
        <?php foreach($promo as $row): ?>
          <div class="col-md-4">
            <a href="<?= base_url('/promo/'.$row->slug.'') ?>" class="item-promo">
              <div class="image" style="background-image: url('<?= base_url($row->image_url) ?>');">
                <div class="periode">
                  <span>Periode Promo</span>
                  <p><?= date("d F Y", strtotime($row->start_date)) ?> - <?= date("d F Y", strtotime($row->end_date)) ?></p>
                </div>
              </div>
              <h6><?= $row->title;?></h6>
            </a>
          </div>
        <?php endforeach;?>
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
