<?= $this->extend('frontend/_partials/overview') ?>

<?= $this->section('content') ?>

<!-- hero -->
<div class="content dark pb-0">
  <div class="title-page white">
    <?= lang("Product.PD11") ?>
  </div>

  <!-- news  -->
  <div class="product-cat">
    <div class="container">
      <div class="row justify-content-center">
        <?php foreach ($principal as $row) : ?>
          <div class="col-md-4">
<<<<<<< HEAD
            <a href="<?= base_url('/product/'.$row->url.'') ?>" class="item-product-cat">
              <img src="<?= base_url($row->image_url) ?>" alt="" class="img-principal">
=======
            <a href="<?= base_url('/product/' . $row->url . '') ?>" class="item-product-cat">
              <?php if (strtolower($row->principal_name) == 'supreme') { ?>
                <img src="<?= base_url($row->image_url) ?>" alt="<?= $row->principal_name ?>" class="img-fluid supreme">
              <?php } else { ?>
                <img src="<?= base_url($row->image_url) ?>" alt="" class="img-fluid">
              <?php } ?>
>>>>>>> 9f2b2d1832b3bad59385a0a85f4430e77dfaa348
            </a>
          </div>
        <?php endforeach; ?>
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
<?= $this->endSection() ?>