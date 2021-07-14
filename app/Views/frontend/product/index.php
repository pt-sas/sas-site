<?= $this->extend('frontend/_partials/overview') ?>

<?= $this->section('content') ?>

<!-- hero -->
<div class="content dark pb-0">
  <div class="title-page white">
    Products
  </div>

  <!-- news  -->
  <div class="product-cat">
    <div class="container">
      <div class="row justify-content-center">
        <?php foreach($principal as $row): ?>
          <div class="col-md-4">
            <a href="<?= base_url('/product/'.$row->url.'') ?>" class="item-product-cat">
              <img src="<?= base_url($row->image_url) ?>" alt="" class="img-fluid">
            </a>
          </div>
        <?php endforeach;?>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <footer class="white">
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
