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
        <div class="col-md-4">
          <a href="<?= base_url('/news/1') ?>" class="item-news">
            <div class="image" style="background-image: url('<?= base_url('adw/assets/images/news1.png') ?>');"></div>
            <h5>Judul artikel disini dengan maksimal 3 baris agar terlihat rapih untuk dilihat</h5>
            <span>5 FEB 2020</span>
          </a>
        </div>
        <div class="col-md-4">
          <a href="<?= base_url('/news/1') ?>" class="item-news">
            <div class="image" style="background-image: url('<?= base_url('adw/assets/images/news2.png') ?>');"></div>
            <h5>Judul artikel disini dengan maksimal 3 baris agar terlihat rapih untuk dilihat</h5>
            <span>5 FEB 2020</span>
          </a>
        </div>
        <div class="col-md-4">
          <a href="<?= base_url('/news/1') ?>" class="item-news">
            <div class="image" style="background-image: url('<?= base_url('adw/assets/images/news3.png') ?>');"></div>
            <h5>Judul artikel disini dengan maksimal 3 baris agar terlihat rapih untuk dilihat</h5>
            <span>5 FEB 2020</span>
          </a>
        </div>
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
        <div class="col-md-4">
          <a href="<?= base_url('/news/1') ?>" class="item-promo">
            <div class="image" style="background-image: url('<?= base_url('adw/assets/images/gal1.png') ?>');">
              <div class="periode">
                <span>Periode Promo</span>
                <p>19 Apr - 30 Jun 2021</p>
              </div>
            </div>
            <h6>Judul promo disini dengan maksimal
              2 baris agar terlihat rapih</h6>
          </a>
        </div>
        <div class="col-md-4">
          <a href="<?= base_url('/news/1') ?>" class="item-promo">
            <div class="image" style="background-image: url('<?= base_url('adw/assets/images/gal2.png') ?>');">
              <div class="periode">
                <span>Periode Promo</span>
                <p>19 Apr - 30 Jun 2021</p>
              </div>
            </div>
            <h6>Judul promo disini dengan maksimal
              2 baris agar terlihat rapih</h6>
          </a>
        </div>
        <div class="col-md-4">
          <a href="<?= base_url('/news/1') ?>" class="item-promo">
            <div class="image" style="background-image: url('<?= base_url('adw/assets/images/gal3.png') ?>');">
              <div class="periode">
                <span>Periode Promo</span>
                <p>19 Apr - 30 Jun 2021</p>
              </div>
            </div>
            <h6>Judul promo disini dengan maksimal
              2 baris agar terlihat rapih</h6>
          </a>
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
