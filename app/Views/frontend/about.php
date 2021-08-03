<?= $this->extend('frontend/_partials/overview') ?>

<?= $this->section('content') ?>

<!-- hero -->
<div class="content">
  <div class="title-page">
    <?= lang("About.AD11") ?>
  </div>

  <!-- photo w text  -->
  <div class="photo-w-text">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-6">
          <div class="image-wrap">
            <div class="image" style="background-image: url('<?= base_url('custom/image/toba.jpg') ?>');width:100%;"></div>
          </div>
        </div>
        <div class="col-md-6">
          <?php
          if (session()->lang == 'id') {
            echo $about['tb_cp_overview'];
          } else {
            echo $about['tb_cp_overview_en'];
          }
          ?>
        </div>
      </div>
    </div>
  </div>

  <!-- visi -->
  <div class="visi-misi bordered-top">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <div class="item-visi">
            <img src="<?= base_url('adw/assets/images/eye.png') ?>" alt="">
            <h6><?= lang("About.AH321") ?></h6>
            <?php
            if (session()->lang == 'id') {
              echo $about['tb_cp_vision'];
            } else {
              echo $about['tb_cp_vision_en'];
            }
            ?>
          </div>
        </div>
        <div class="col-md-4">
          <div class="item-visi">
            <img src="<?= base_url('adw/assets/images/target.png') ?>" alt="">
            <h6><?= lang("About.AH322") ?></h6>
            <?php
            if (session('lang') == 'id') {
              echo $about['tb_cp_mision'];
            } else {
              echo $about['tb_cp_mision_en'];
            }
            ?>
          </div>
        </div>
        <div class="col-md-4">
          <div class="item-visi">
            <img src="<?= base_url('adw/assets/images/task.png') ?>" alt="">
            <h6><?= lang("About.AH323") ?></h6>
            <?php
            if (session('lang') == 'id') {
              echo $about['tb_cp_objectives'];
            } else {
              echo $about['tb_cp_objectives_en'];
            }
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- flow -->
  <div class="flow bordered-top">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="image">
            <?php if (session()->lang == 'id') { ?>
              <img src="<?= base_url('custom/image/flow-ind.png') ?>" alt="PT CKJ" class="img-responsive" width="100%">
            <?php } else { ?>
              <img src="<?= base_url('custom/image/flow-en.png') ?>" alt="PT CKJ" class="img-responsive" width="100%">
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- map  -->
  <div class="map-wrap bordered-top">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h6 class="map-title"><?= lang("About.AH641") ?></h6>
          <ul class="nav">
            <?php foreach ($location as $count => $row) : ?>
              <li class="nav-item">
                <a href="#<?= $row->location; ?>" <?php if ($count == 0) {
                                                    echo 'class="nav-link active"';
                                                  } else {
                                                    echo 'class="nav-link"';
                                                  } ?> aria-controls="tab-<?= $row->md_location_id; ?>" role="tab" data-toggle="tab"><?= $row->name; ?></a>
              </li>
            <?php endforeach; ?>
          </ul>
          <div class="map-contain">
            <div id="map" class="map"></div>
            <div class="tab-content">
              <?php foreach ($location as $count => $row) : ?>
                <div role="tabpanel" id="<?= $row->location; ?>" <?php if ($count == 0) {
                                                                  echo 'class="map-address tab-pane fade show active"';
                                                                } else {
                                                                  echo 'class="map-address tab-pane fade"';
                                                                } ?>>
                  <h4><?= $row->name; ?></h4>
                  <p>
                    <?= $row->address1; ?>
                  </p>
                  <a href="<?= $row->url ?>">Get direction</a>
                  <div class="clearfix"></div>
                  <div class="half-wrap">
                    <h6>Phone Number</h6>
                    <p><?= $row->phone; ?></p>
                  </div>
                  <div class="half-wrap">
                    <h6>Email</h6>
                    <p>info@sahabatabadi.com</p>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
          </div>
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
