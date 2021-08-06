<?= $this->extend('frontend/_partials/overview') ?>

<?= $this->section('content') ?>

<!-- hero -->
<div class="content dark pb-0">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="product-head center">
          <a href="javascript:void(0)" onclick="window.history.go(-1);" class="back-link">Back to product list</a>
          <h2>Compare Product</h2>
        </div>
      </div>
    </div>
  </div>

  <!-- news  -->
  <div class="compare-wrap">
    <div class="container">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="row">
            <div class="col-md-4">
              <h6 class="name-product">Phillips Esentials</h6>
              <div class="image">
                <img src="<?= base_url('adw/assets/images/product1.png') ?>" alt="" class="img-fluid">
              </div>
            </div>
            <div class="col-md-4">
              <h6 class="name-product">Phillips Downlight</h6>
              <div class="image">
                <img src="<?= base_url('adw/assets/images/product2.png') ?>" alt="" class="img-fluid">
              </div>
            </div>
            <div class="col-md-4">
              <h6 class="name-product">Phlips LED WI-FI Color</h6>
              <div class="image">
                <img src="<?= base_url('adw/assets/images/product3.png') ?>" alt="" class="img-fluid">
              </div>
            </div>
            <div class="col-md-12">
              <h5 class="compare-title">Data to compare</h5>
            </div>
            <div class="col-md-4">
              <p class="compare-diff">Purus habitant faucibus viverra porttitor felis. Odio quisque amet sagittis velit diam.</p>
              <p class="compare-diff">Purus habitant faucibus viverra porttitor felis. Odio quisque amet sagittis velit diam.</p>
              <p class="compare-diff">Purus habitant faucibus viverra porttitor felis. Odio quisque amet sagittis velit diam.</p>
            </div>
            <div class="col-md-4">
              <p class="compare-diff">-</p>
              <p class="compare-diff">Purus habitant faucibus viverra porttitor felis. Odio quisque amet sagittis velit diam.</p>
              <p class="compare-diff">-</p>
            </div>
            <div class="col-md-4">
              <p class="compare-diff">Purus habitant faucibus viverra porttitor felis. Odio quisque amet sagittis velit diam.</p>
              <p class="compare-diff">Purus habitant faucibus viverra porttitor felis. Odio quisque amet sagittis velit diam.</p>
              <p class="compare-diff">Purus habitant faucibus viverra porttitor felis. Odio quisque amet sagittis velit diam.</p>
            </div>
            <div class="col-md-12">
              <h5 class="compare-title">Data to compare</h5>
            </div>
            <div class="col-md-4">
              <p class="compare-diff">Purus habitant faucibus viverra porttitor felis. Odio quisque amet sagittis velit diam.</p>
              <p class="compare-diff">Purus habitant faucibus viverra porttitor felis. Odio quisque amet sagittis velit diam.</p>
              <p class="compare-diff">Purus habitant faucibus viverra porttitor felis. Odio quisque amet sagittis velit diam.</p>
            </div>
            <div class="col-md-4">
              <p class="compare-diff">-</p>
              <p class="compare-diff">Purus habitant faucibus viverra porttitor felis. Odio quisque amet sagittis velit diam.</p>
              <p class="compare-diff">-</p>
            </div>
            <div class="col-md-4">
              <p class="compare-diff">Purus habitant faucibus viverra porttitor felis. Odio quisque amet sagittis velit diam.</p>
              <p class="compare-diff">Purus habitant faucibus viverra porttitor felis. Odio quisque amet sagittis velit diam.</p>
              <p class="compare-diff">Purus habitant faucibus viverra porttitor felis. Odio quisque amet sagittis velit diam.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <?= $this->include('frontend/_partials/footer'); ?>
      </div>
    </div>
  </div>
</div>

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