<?= $this->extend('frontend/_partials/overview') ?>

<?= $this->section('content') ?>

<!-- hero -->
<div class="content">
  <div class="title-page">
    Contact Us
  </div>

  <!-- contact box  -->
  <div class="contact-box-wrap">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <div class="contact-box">
            <img src="<?= base_url('adw/assets/images/map-pin.png') ?>" alt="">
            <h5>Our Headquarter</h5>
            <p>Jalan Indokarya III Blok F1-2,
              Tanjung Priok, Kota Jakarta Utara,
              DKI Jakarta 14340</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="contact-box">
            <img src="<?= base_url('adw/assets/images/headphones.png') ?>" alt="">
            <h5>Lets Talk</h5>
            <p>Phone : (021) 6583 1188</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="contact-box">
            <img src="<?= base_url('adw/assets/images/mail.png') ?>" alt="">
            <h5>Our Mail</h5>
            <p>info@sahabatabadi.com</p>
          </div>
        </div>
      </div>
    </div>
  </div>


  <!-- form contact -->
  <div class="half-half-wrap pb-0">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <h4 class="left-title">How we can help you?</h4>
        </div>
        <div class="col-md-8">
          <form action="" class="form-contact">
            <p class="desc">Fill out the form and we'll be in touch soon!</p>
            <div class="row">
              <div class="col-md-6">
                <input type="text" class="form-control" placeholder="Name">
              </div>
              <div class="col-md-6">
                <input type="email" class="form-control" placeholder="Email address">
              </div>
              <div class="col-md-6">
                <input type="text" class="form-control" placeholder="Subject">
              </div>
              <div class="col-md-3">
                <input type="text" class="form-control" placeholder="Inquiry">
              </div>
              <div class="col-md-3">
                <input type="text" class="form-control" placeholder="Phone number">
              </div>
            </div>
            <textarea name="" class="form-control" id="" rows="5" placeholder="Message"></textarea>
            <div class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" id="customCheck1">
              <label class="custom-control-label" for="customCheck1">
                I accept the terms & conditions and I understand that my data will be hold securely in accordance with the privacy policy.
              </label>
            </div>
            <div class="clearfix"></div>
            <button type="submit" class="btn btn-primary mt-3">Send</button>
          </form>
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
