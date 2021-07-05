<?= $this->extend('frontend/_partials/overview') ?>

<?= $this->section('content') ?>

<!-- hero -->
<div class="content">
  <div class="title-page">
    About Us
  </div>

  <!-- photo w text  -->
  <div class="photo-w-text">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-5">
          <div class="image-wrap">
            <div class="image top" style="background-image: url('<?= base_url('adw/assets/images/news1.png') ?>');"></div>
            <div class="image bot" style="background-image: url('<?= base_url('adw/assets/images/news2.png') ?>');"></div>
          </div>
        </div>
        <div class="col-md-7">
          <p>Founded in 1987, we trace back our roots to Philips Lighting professional and automotive products. Since then, we continue to grow together with leading brands in the electrical industry to expand our reach and service coverage throughout Indonesia.</p>
          <p>We believe in integrity, commitment and professionalism as our fundamental pillars and defining qualities.</p>
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
            <h6>Our Vision</h6>
            <p>Innovate and modernize our distribution strategies to reach and serve customers by continuously enhancing human capital and laying the foundations for a digital infrastructure.</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="item-visi">
            <img src="<?= base_url('adw/assets/images/target.png') ?>" alt="">
            <h6>Our Mission</h6>
            <p>Became the leading distribution company within the electrical industry, providing customers with optimal solutions relevant in the current digital era.</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="item-visi">
            <img src="<?= base_url('adw/assets/images/task.png') ?>" alt="">
            <h6>Our Objective</h6>
            <p>We aim for the highest quality results and honoring our commitment to satisfy customers, shareholders, and employees.</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- flow -->
  <div class="flow bordered-top">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="item-flow">
            <h6>
              Company Founded Appointed as
              Philips Authorized Distributor
            </h6>
            <h3>1987</h3>
            <img src="<?= base_url('adw/assets/images/point.png') ?>" alt="">
          </div>
        </div>
        <div class="col-md-6">
          <div class="item-flow">
            <h6>
              Appointed as Supreme Authorized Distributor
              Appointed as Schneider Authorized Distributor
            </h6>
            <h3>2017</h3>
            <img src="<?= base_url('adw/assets/images/point.png') ?>" alt="">
          </div>
        </div>
        <div class="col-md-12 text-center">
          <img src="<?= base_url('adw/assets/images/flow.png') ?>" alt="" class="img-fluid img-flow">
        </div>
        <div class="col-md-6 offset-md-3">
          <div class="item-flow upside">
            <img src="<?= base_url('adw/assets/images/point.png') ?>" alt="" class="rotate">
            <h3 class="d-none d-md-block">2009</h3>
            <h6>
              Appointed as Legrand Authorized Distributor
              Appointed as Panasonic Authorized Distributor
            </h6>
            <h3 class="d-block d-md-none">2009</h3>
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
          <h6 class="map-title">Our location</h6>
          <ul class="nav">
            <li class="nav-item">
              <a class="nav-link active" id="sunter-tab" data-toggle="tab" href="#sunter" role="tab" aria-controls="sunter" aria-selected="true">Sunter Office</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="tebet-tab" data-toggle="tab" href="#tebet" role="tab" aria-controls="tebet" aria-selected="false">Tebet Stockist</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="glodok-tab" data-toggle="tab" href="#glodok" role="tab" aria-controls="glodok" aria-selected="false">Glodok Stockist</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="kenari-tab" data-toggle="tab" href="#kenari" role="tab" aria-controls="kenari" aria-selected="false">Kenari Stockist</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="tangerang-tab" data-toggle="tab" href="#tangerang" role="tab" aria-controls="tangerang" aria-selected="false">Tangerang Stockist</a>
            </li>
          </ul>
          <div class="map-contain">
            <div id="map" class="map"></div>
            <div class="map-address tab-pane fade show active" id="sunter" role="tabpanel" aria-labelledby="sunter-tab">
              <h4>Sunter Office</h4>
              <p>
                Jalan Indokarya III Blok F1-2, Tanjung Priok, Kota Jakarta Utara, DKI Jakarta 14340
              </p>
              <a href="">Get direction</a>
              <div class="clearfix"></div>
              <div class="half-wrap">
                <h6>Phone Number</h6>
                <p>+62 21 6583 1188</p>
              </div>
              <div class="half-wrap">
                <h6>Email</h6>
                <p>info@sahabatabadi.com</p>
              </div>
            </div>

            <div class="map-address tab-pane fade" id="tebet" role="tabpanel" aria-labelledby="tebet-tab">
              <h4>Tebet Stockist</h4>
              <p>
                Ruko Crown Palace Blok D 16-17, Tebet, Kota Jakarta Selatan, DKI Jakarta 12870
              </p>
              <a href="">Get direction</a>
              <div class="clearfix"></div>
              <div class="half-wrap">
                <h6>Phone Number</h6>
                <p>+62 21 837 08838</p>
              </div>
              <div class="half-wrap">
                <h6>Email</h6>
                <p>info@sahabatabadi.com</p>
              </div>
            </div>

            <div class="map-address tab-pane fade" id="glodok" role="tabpanel" aria-labelledby="glodok-tab">
              <h4>Glodok Stockist</h4>
              <p>
                Ruko Glodok Plaza, Blok F No. 21-22,  Taman Sari, Kota Jakarta Barat, DKI Jakarta 11110
              </p>
              <a href="">Get direction</a>
              <div class="clearfix"></div>
              <div class="half-wrap">
                <h6>Phone Number</h6>
                <p>+62 21 659 2247</p>
              </div>
              <div class="half-wrap">
                <h6>Email</h6>
                <p>info@sahabatabadi.com</p>
              </div>
            </div>

            <div class="map-address tab-pane fade" id="kenari" role="tabpanel" aria-labelledby="kenari-tab">
              <h4>Kenari Stockist</h4>
              <p>
                Plaza Kenari Mas, Jl. Kramat Raya No.101,  Senen, Kota Jakarta Pusat, DKI Jakarta 10440
              </p>
              <a href="">Get direction</a>
              <div class="clearfix"></div>
              <div class="half-wrap">
                <h6>Phone Number</h6>
                <p>+62 21 398 45733</p>
              </div>
              <div class="half-wrap">
                <h6>Email</h6>
                <p>info@sahabatabadi.com</p>
              </div>
            </div>

            <div class="map-address tab-pane fade" id="tangerang" role="tabpanel" aria-labelledby="tangerang-tab">
              <h4>Tangerang Stockist</h4>
              <p>
                Jalan Indokarya III Blok F1-2,  Tanjung Priok, Kota Jakarta Utara, DKI Jakarta 14340
              </p>
              <a href="">Get direction</a>
              <div class="clearfix"></div>
              <div class="half-wrap">
                <h6>Phone Number</h6>
                <p>+62 21 2230 1188</p>
              </div>
              <div class="half-wrap">
                <h6>Email</h6>
                <p>info@sahabatabadi.com</p>
              </div>
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
        <p>© Copyright 2021 PT. Sahabat Abadi Sejahtera - All rights reserved.</p>
        <a href="" class="foot-socmed"><i class="fa fa-facebook-f"></i></a>
        <a href="" class="foot-socmed"><i class="fa fa-twitter"></i></a>
        <a href="" class="foot-socmed"><i class="fa fa-instagram"></i></a>
      </footer>
    </div>
  </div>
</div>
<?= $this->endSection() ?>
