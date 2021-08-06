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
            <li class="breadcrumb-item"><a href="<?= base_url('/news') ?>"><?= lang("EventDetail.EDBR11") ?></a></li>
            <li class="breadcrumb-item active" aria-current="page">
              <?= session()->lang == 'id' ? $promo->title : $promo->title_en ?>
            </li>
          </ol>
        </div>
      </div>
      <div class="row my-4">
        <div class="col-md-4">
          <div class="image" style="background-image: url('<?= base_url($promo->image_url) ?>');"></div>
        </div>
        <div class="col-md-8">
          <?= session()->lang == 'id' ? $promo->title : $promo->title_en ?>
          <h6><?= lang("EventDetail.EDH61") ?> : <?= session()->lang == 'id' ? format_idn(date('Y-m-d', strtotime($promo->start_date))) . " - " . format_idn(date('Y-m-d', strtotime($promo->end_date)))  : date("F jS, Y", strtotime($promo->start_date)) . " - " . date("F jS, Y", strtotime($promo->end_date)) ?></h6>
          <hr>
          <?= session()->lang == 'id' ? $promo->content : $promo->content_en ?>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <footer>
        <p>© Copyright 2021 PT Sahabat Abadi Sejahtera - All rights reserved.</p>
        <a href="javascript:void(0);" onclick="window.open('https://www.facebook.com/pages/PT.%20Sahabat%20Abadi%20Sejahtera/268648619839788/', '_blank')" class="foot-socmed"><i class="fa fa-facebook-f"></i></a>
        <a href="javascript:void(0);" onclick="window.open('https://www.youtube.com/channel/UCeB2XhHrFdFD3P1cw3Q9swg', '_blank')" class="foot-socmed"><i class="fa fa-youtube"></i></a>
        <a href="javascript:void(0);" onclick="window.open('https://www.linkedin.com/company/sahabat-abadi-sejahtera', '_blank')" class="foot-socmed"><i class="fa fa-linkedin"></i></a>
        <a href="javascript:void(0);" onclick="window.open('https://www.instagram.com/explore/locations/317814588/ptsahabat-abadi-sejahtera-philips-indonesia-sunter', '_blank')" class="foot-socmed"><i class="fa fa-instagram"></i></a>
      </footer>
    </div>
  </div>
</div>
<?= $this->endSection() ?>