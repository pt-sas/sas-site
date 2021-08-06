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
            <a href="<?= base_url('/product/' . $row->url . '') ?>" class="item-product-cat">
              <img src="<?= base_url($row->image_url) ?>" alt="" class="img-principal">
            </a>
          </div>
        <?php endforeach; ?>
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
<?= $this->endSection() ?>