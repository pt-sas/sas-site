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
            <li class="breadcrumb-item" style="font-size: 15px;"><a href="<?= base_url('/news') ?>"><?= lang("EventDetail.EDBR11") ?></a></li>
            <li class="breadcrumb-item active" aria-current="page" style="font-size: 15px;">
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
        <?= $this->include('frontend/_partials/footer'); ?>
      </footer>
    </div>
  </div>
</div>
<?= $this->endSection() ?>