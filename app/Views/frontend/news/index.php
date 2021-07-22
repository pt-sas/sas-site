<?= $this->extend('frontend/_partials/overview') ?>

<?= $this->section('content') ?>

<!-- hero -->
<div class="content">
  <div class="title-page">
    <?= lang("News.ND11") ?>
  </div>

  <!-- news  -->
  <div class="news-page-wrap">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h5 class="sec-title"><?= lang("News.NH511") ?></h5>
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
          <h5 class="sec-title"><?= lang("News.NH521") ?></h5>
        </div>
        <?php foreach($promo as $row): ?>
          <div class="col-md-4">
            <a href="<?= base_url('/event/'.$row->slug.'') ?>" class="item-promo">
              <div class="image" style="background-image: url('<?= base_url($row->image_url) ?>');">
                <div class="periode">
                  <span><?= lang("News.NSP21") ?></span>
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
