<?= $this->extend('frontend/_partials/overview') ?>

<?= $this->section('content') ?>

<!-- hero -->
<!-- header fixed -->
<div class="product-head fixed d-none">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <a href="<?= base_url('product') ?>" class="back-link">Back to product list</a>
        <h2>Phillips Product</h2>
        <a href="<?= base_url('product/compare') ?>" class="btn btn-white">COMPARE PRODUCT</a>
      </div>
    </div>
  </div>
</div>

<!-- hero -->
<div class="content dark pb-0">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="product-head">
          <a href="<?= base_url('product') ?>" class="back-link">Back to product list</a>
          <h2>Phillips Product</h2>
          <a href="<?= base_url('product/compare') ?>" class="btn btn-white">COMPARE PRODUCT</a>
        </div>
      </div>
    </div>
  </div>

  <!-- news  -->
  <div class="product-wrap">
    <div class="container">
      <div class="row">
        <div class="col-md-4 col-lg-3">
          <div class="item-product">
            <div class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" id="customCheck1">
              <label class="custom-control-label" for="customCheck1">Compare</label>
            </div>
            <a href="javascript:void(0);" data-toggle="modal" data-target="#modalProduct">
              <div class="image-wrap">
                <img src="<?= base_url('adw/assets/images/product1.png') ?>" alt="" class="img-fluid">
              </div>
              <h5>Phillips Esentials</h5>
              <p>Sort description about product</p>
            </a>
          </div>
        </div>
        <div class="col-md-4 col-lg-3">
          <div class="item-product">
            <div class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" id="customCheck2">
              <label class="custom-control-label" for="customCheck2">Compare</label>
            </div>
            <a href="javascript:void(0);" data-toggle="modal" data-target="#modalProduct">
              <div class="image-wrap">
                <img src="<?= base_url('adw/assets/images/product2.png') ?>" alt="" class="img-fluid">
              </div>
              <h5>Phillips Downlight</h5>
              <p>Sort description about product</p>
            </a>
          </div>
        </div>
        <div class="col-md-4 col-lg-3">
          <div class="item-product">
            <div class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" id="customCheck3">
              <label class="custom-control-label" for="customCheck3">Compare</label>
            </div>
            <a href="javascript:void(0);" data-toggle="modal" data-target="#modalProduct">
              <div class="image-wrap">
                <img src="<?= base_url('adw/assets/images/product3.png') ?>" alt="" class="img-fluid">
              </div>
              <h5>Phlips LED WI-FI Color</h5>
              <p>Sort description about product</p>
            </a>
          </div>
        </div>
        <div class="col-md-4 col-lg-3">
          <div class="item-product">
            <div class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" id="customCheck4">
              <label class="custom-control-label" for="customCheck4">Compare</label>
            </div>
            <a href="javascript:void(0);" data-toggle="modal" data-target="#modalProduct">
              <div class="image-wrap">
                <img src="<?= base_url('adw/assets/images/product4.png') ?>" alt="" class="img-fluid">
              </div>
              <h5>Phlips LED Downlight</h5>
              <p>Sort description about product</p>
            </a>
          </div>
        </div>
        <div class="col-md-4 col-lg-3">
          <div class="item-product">
            <div class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" id="customCheck5">
              <label class="custom-control-label" for="customCheck5">Compare</label>
            </div>
            <a href="javascript:void(0);" data-toggle="modal" data-target="#modalProduct">
              <div class="image-wrap">
                <img src="<?= base_url('adw/assets/images/product2.png') ?>" alt="" class="img-fluid">
              </div>
              <h5>Phillips Downlight</h5>
              <p>Sort description about product</p>
            </a>
          </div>
        </div>
        <div class="col-md-4 col-lg-3">
          <div class="item-product">
            <div class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" id="customCheck6">
              <label class="custom-control-label" for="customCheck6">Compare</label>
            </div>
            <a href="javascript:void(0);" data-toggle="modal" data-target="#modalProduct">
              <div class="image-wrap">
                <img src="<?= base_url('adw/assets/images/product4.png') ?>" alt="" class="img-fluid">
              </div>
              <h5>Phlips LED Downlight</h5>
              <p>Sort description about product</p>
            </a>
          </div>
        </div>
        <div class="col-md-4 col-lg-3">
          <div class="item-product">
            <div class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" id="customCheck7">
              <label class="custom-control-label" for="customCheck7">Compare</label>
            </div>
            <a href="javascript:void(0);" data-toggle="modal" data-target="#modalProduct">
              <div class="image-wrap">
                <img src="<?= base_url('adw/assets/images/product2.png') ?>" alt="" class="img-fluid">
              </div>
              <h5>Phillips Downlight</h5>
              <p>Sort description about product</p>
            </a>
          </div>
        </div>
        <div class="col-md-4 col-lg-3">
          <div class="item-product">
            <div class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" id="customCheck8">
              <label class="custom-control-label" for="customCheck8">Compare</label>
            </div>
            <a href="javascript:void(0);" data-toggle="modal" data-target="#modalProduct">
              <div class="image-wrap">
                <img src="<?= base_url('adw/assets/images/product1.png') ?>" alt="" class="img-fluid">
              </div>
              <h5>Phillips Esentials</h5>
              <p>Sort description about product</p>
            </a>
          </div>
        </div>
        <div class="col-md-12 text-center">
          <button class="btn btn-whites mt-3">Load More <img src="<?= base_url('adw/assets/images/loader.png') ?>" alt="" class="spinning" /></button>
        </div>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <footer class="white">
          <p>© Copyright 2021 PT Sahabat Abadi Sejahtera - All rights reserved.</p>
          <a href="javascript:void(0);" onclick="window.open('https://www.facebook.com/pages/PT.%20Sahabat%20Abadi%20Sejahtera/268648619839788/', '_blank')" class="foot-socmed"><i class="fa fa-facebook-f"></i></a>
          <a href="javascript:void(0);" onclick="window.open('https://www.youtube.com/channel/UCeB2XhHrFdFD3P1cw3Q9swg', '_blank')" class="foot-socmed"><i class="fa fa-youtube"></i></a>
          <a href="javascript:void(0);" onclick="window.open('https://www.linkedin.com/company/sahabat-abadi-sejahtera', '_blank')" class="foot-socmed"><i class="fa fa-linkedin"></i></a>
          <a href="javascript:void(0);" onclick="window.open('https://www.instagram.com/explore/locations/317814588/ptsahabat-abadi-sejahtera-philips-indonesia-sunter', '_blank')" class="foot-socmed"><i class="fa fa-instagram"></i></a>
        </footer>
      </div>
    </div>
  </div>
</div>


<!-- kontak kami -->
<a href="" class="kontak"><img src="<?= base_url('adw/assets/images/wa.png') ?>" alt=""> Hubungi Kami</a>

<!-- Modal -->
<div class="modal fade" id="modalProduct" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <img src="<?= base_url('adw/assets/images/close.png') ?>" alt="">
        </button>
        <div class="row align-items-center">
          <div class="col-md-5">
            <img src="<?= base_url('adw/assets/images/product-big.png') ?>" alt="" class="img-fluid mb-4 mb-md-0">
          </div>
          <div class="col-md-7">
            <h4 class="mb-2">Phillips Essentials</h4>
            <ul class="no-style">
              <li>Emergency function could be used up to 5 hours.</li>
              <li>Save energy up to 90% compared with regular incandescent bulbs.</li>
              <li>Can operate within 100 - 240 V.</li>
              <li>Instant start.</li>
              <li>Very good color rendering > 80.</li>
              <li>No IR & UV radiation.</li>
              <li>Frosted cover made of PC (Poly Carbonate), impact resistant.</li>
              <li>Made of PBT (Polybutylene terephthalate), heat resistant until 150º C.</li>
              <li>Long Life lamp up to 15'000 hours and Save Maintenance costs.</li>
              <li>Low heat radiation.</li>
            </ul>
            <h6 class="ecom-title">PRODUCT AVAILABLE ON</h6>
            <a href="" class="ecom"><img src="<?= base_url('adw/assets/images/tokped.png') ?>" alt=""></a>
            <a href="" class="ecom"><img src="<?= base_url('adw/assets/images/jdid.png') ?>" alt=""></a>
            <a href="" class="ecom"><img src="<?= base_url('adw/assets/images/shopee.png') ?>" alt=""></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>
