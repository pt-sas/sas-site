<?= $this->extend('frontend/_partials/overview') ?>

<?= $this->section('content') ?>

<!-- hero -->
<div class="hero">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <span class="underline"></span>
        <h3 class="d-none">PT. Sahabat Abadi Sejahtera</h3>
        <h2 class="slogan">Beyond Authorized Distributor</h2>
        <p>Bring together a human approach with advanced technology to create an efficient and effective office space.</p>
        <lottie-player src="<?= base_url('adw/assets/animation-file/Electricity_Animations.json') ?>"  background="transparent"  speed="1"  style="width: 100%; height: auto;" loop autoplay></lottie-player>
        <a href="javascript:void(0);" class="scroll-down">Scroll Down <img src="<?= base_url('adw/assets/images/chevrons-down.png') ?>" alt=""></a>
      </div>
    </div>
  </div>
</div>

<!-- why us -->
<div class="why-us">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="head-sect">
          <h3>Why us?</h3>
          <p>We experienced in Lighting and Electrical Equipment in Indonesia</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="item-why">
          <img src="<?= base_url('adw/assets/images/codepen.png') ?>" alt="">
          <h4>Feature title in here</h4>
          <p>Quis fringilla egestas dis viverra semper mmo Massa vivamus accumsan imperdiet et urna tempor aliquet</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="item-why">
          <img src="<?= base_url('adw/assets/images/codepen.png') ?>" alt="">
          <h4>Feature title in here</h4>
          <p>Quis fringilla egestas dis viverra semper mmo Massa vivamus accumsan imperdiet et urna tempor aliquet</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="item-why">
          <img src="<?= base_url('adw/assets/images/codepen.png') ?>" alt="">
          <h4>Feature title in here</h4>
          <p>Quis fringilla egestas dis viverra semper mmo Massa vivamus accumsan imperdiet et urna tempor aliquet</p>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- partners -->
<div class="home-partners">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-6 text-center">
        <div class="partner-wrap">
          <div class="partner-item">
            <img src="<?= base_url('adw/assets/images/partner1.png') ?>" alt="">
          </div>
          <div class="partner-item">
            <img src="<?= base_url('adw/assets/images/partner4.png') ?>" alt="">
          </div>
        </div>
        <div class="partner-wrap second">
          <div class="partner-item">
            <img src="<?= base_url('adw/assets/images/partner2.png') ?>" alt="">
          </div>
          <div class="partner-item">
            <img src="<?= base_url('adw/assets/images/partner5.png') ?>" alt="">
          </div>
        </div>
        <div class="partner-wrap third">
          <div class="partner-item">
            <img src="<?= base_url('adw/assets/images/partner3.png') ?>" alt="">
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <h3>
          Explore more our
          brand partners
        </h3>
        <p>Quis fringilla egestas dis viverra semper commodo. Massa vivamus accumsan imperdiet et. Ut urna tempor aliquet elementum eget ultrices vitae. Convallis vulputate at malesuada orci morbi. Ut elementum nunc justo orci, sagittis mauris vestibulum purus. </p>
        <a href="<?= base_url('/product') ?>">SEE MORE <img src="<?= base_url('adw/assets/images/arrow-right.png') ?>" alt=""></a>
      </div>
    </div>
  </div>
</div>

<!-- news -->
<div class="home-news">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="head-sect dark">
          <h3>Latest News</h3>
          <p>Updates article all about lighting and electical equipment</p>
        </div>
      </div>
      <div class="col-md-4">
        <a href="news-detail.html" class="item-news">
          <div class="image" style="background-image: url('<?= base_url('adw/assets/images/news1.png') ?>');"></div>
          <h5>Judul artikel disini dengan maksimal 3 baris agar terlihat rapih untuk dilihat</h5>
          <span>5 FEB 2020</span>
        </a>
      </div>
      <div class="col-md-4">
        <a href="news-detail.html" class="item-news">
          <div class="image" style="background-image: url('<?= base_url('adw/assets/images/news2.png') ?>');"></div>
          <h5>Judul artikel disini dengan maksimal 3 baris agar terlihat rapih untuk dilihat</h5>
          <span>5 FEB 2020</span>
        </a>
      </div>
      <div class="col-md-4">
        <a href="news-detail.html" class="item-news">
          <div class="image" style="background-image: url('<?= base_url('adw/assets/images/news3.png') ?>');"></div>
          <h5>Judul artikel disini dengan maksimal 3 baris agar terlihat rapih untuk dilihat</h5>
          <span>5 FEB 2020</span>
        </a>
      </div>
    </div>
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
</div>
<?= $this->endSection() ?>
