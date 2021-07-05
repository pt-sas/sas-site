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
            <li class="breadcrumb-item"><a href="news.html">Artikel</a></li>
            <li class="breadcrumb-item active" aria-current="page">Artikel Detail</li>
          </ol>
          <h4>Judul artikel disini dengan maksimal 2 baris agar terlihat rapih</h4>
          <div class="image" style="background-image: url('<?= base_url('adw/assets/images/news-big.png') ?>');"></div>
          <p>Quis fringilla egestas dis viverra semper commodo. Massa vivamus accumsan imperdiet et. Ut urna tempor aliquet elementum eget ultrices vitae. Convallis vulputate at malesuada orci morbi. Ut elementum nunc justo orci, sagittis mauris vestibulum purus. Enim cursus aenean neque fames hendrerit nulla eu ipsum erat. Nunc sed nam libero nulla pellentesque non libero est aliquam. Sit ut sit risus dictumst. Sodales sed pretium eget nisl, pellentesque donec. Turpis in viverra elementum facilisis. Sit et ac enim purus lectus sodales et risus. Semper quam a, nunc massa aliquam.</p>
          <p>Quis fringilla egestas dis viverra semper commodo. Massa vivamus accumsan imperdiet et. Ut urna tempor aliquet elementum eget ultrices vitae. Convallis vulputate at malesuada orci morbi. Ut elementum nunc justo orci, sagittis mauris vestibulum purus. Enim cursus aenean neque fames hendrerit nulla eu ipsum erat. Nunc sed nam libero nulla pellentesque non libero est aliquam. </p>
          <p>Quis fringilla egestas dis viverra semper commodo. Massa vivamus accumsan imperdiet et. Ut urna tempor aliquet elementum eget ultrices vitae. Convallis vulputate at malesuada orci morbi. Ut elementum nunc justo orci, sagittis mauris vestibulum purus. Enim cursus aenean neque fames hendrerit nulla eu ipsum erat. Nunc sed nam libero nulla pellentesque non libero est aliquam. Sit ut sit risus dictumst. Sodales sed pretium eget nisl, pellentesque donec. Turpis in viverra elementum facilisis. Sit et ac enim purus lectus sodales et risus. Semper quam a, nunc massa aliquam.</p>
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
