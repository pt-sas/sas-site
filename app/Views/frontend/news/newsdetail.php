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
            <li class="breadcrumb-item"><a href="<?= base_url('/news') ?>"><?= lang("NewsDetail.NDBR11") ?></a></li>
            <li class="breadcrumb-item active" aria-current="page">
              <?php if(session()->lang == 'id') {
                echo $news->title;
              } else {
                echo $news->title_en;
              } ?>
            </li>
          </ol>
          <?php if(session()->lang == 'id') { ?>
            <h4><?= $news->title ?></h4>
          <?php } else { ?>
            <h4><?= $news->title_en ?></h4>
          <?php } ?>
          <small><?= date("d F Y", strtotime($news->news_date)) ?></small>
          <div class="image my-4" style="background-image: url('<?= base_url($news->image_url) ?>');"></div>
          <?php if(session()->lang == 'id') {
            echo $news->content;
          } else {
            echo $news->content_en;
          } ?>
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
