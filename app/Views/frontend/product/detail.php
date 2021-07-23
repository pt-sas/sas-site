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
          <a href="<?= base_url('product') ?>" class="back-link"><?= lang("ProductDetail.PDA11") ?></a>
          <h2><?= $principal->name ?> Product</h2>
          <!-- <a href="<?= base_url('product/compare') ?>" class="btn btn-white">COMPARE PRODUCT</a> -->
        </div>
      </div>
    </div>
  </div>

  <div class="half-half-wrap">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <div class="filter-product">
            <select class="form-control" name="category1" id="category1">
              <option value=""></option>
              <?php foreach ($category1 as $row) : ?>
                <option value="<?= $row->md_category_id ?>"><?= $row->category ?></option>
              <?php endforeach; ?>
            </select>
          </div>
        </div>
        <div class="col-md-3">
          <div class="filter-product">
            <select class="form-control" name="category2" id="category2">
              <option value=""></option>
              <option value="59">LED Tape</option>
            </select>
          </div>
        </div>
        <div class="col-md-3">
          <div class="filter-product">
            <select class="form-control" name="category3" id="category3">
              <option value=""></option>
              <option value="128">DLI Tape</option>
            </select>
          </div>
        </div>
        <div class="col-md-3">
          <div class="filter-product">
            <button type="button" class="btn btn-primary btn_filter">Filter</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- news  -->
  <div class="product-wrap">
    <div class="container">
      <div class="row card-product">
        <?php foreach ($product as $row) : ?>
          <div class="col-md-4 col-lg-3">
            <div class="item-product">
              <a href="javascript:void(0);" data-toggle="modal" data-target="#modalProduct">
                <div class="image-wrap">
                  <img src="<?= base_url() . '/custom/image/product/' . $row->url ?>" alt="" class="img-fluid">
                </div>
                <h5><?= $row->name ?></h5>
                <p>Sort description about product</p>
              </a>
            </div>
          </div>
        <?php endforeach; ?>

        <!-- <div class="col-md-12 text-center">
          <button class="btn btn-whites mt-3">Load More <img src="<?= base_url('adw/assets/images/loader.png') ?>" alt="" class="spinning" /></button>
        </div> -->
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

<script type="text/javascript">
  var SITE_URL = window.location.href;
  var LAST_URL = SITE_URL.substr(SITE_URL.lastIndexOf('/') + 1); //the last url

  // $('#category1').change(function(evt) {
  //   var category1 = $(this).val();
  //   let url = '<?= base_url('backend/productgroup/getCategory') ?>';

  //   $.ajax({
  //     url: url,
  //     type: 'POST',
  //     data: {
  //       principal: LAST_URL,
  //       category1: category1
  //     },
  //     dataType: 'JSON',
  //     success: function(result) {
  //       $('#category2').empty();
  //       $('#category2').append('<option selected="selected" value=""></option>');

  //       if (result[0].success) {
  //         var data = result[0].message;

  //         $.each(data, function(idx, elem) {
  //           var category_id = elem.md_category_id;
  //           var name = elem.category;

  //           $('#category2').append('<option value="' + category_id + '">' + name + '</option>');
  //         });
  //       } else {
  //         Swal.fire({
  //           type: 'error',
  //           title: result[0].message,
  //           timer: 1500
  //         });
  //       }
  //     },
  //     error: function(jqXHR, exception) {
  //       showError(jqXHR, exception);
  //     }
  //   });
  // });

  // $('#category2').change(function(evt) {
  //   var category2 = $(this).val();
  //   let url = '<?= base_url('backend/productgroup/getCategory') ?>';

  //   $.ajax({
  //     url: url,
  //     type: 'POST',
  //     data: {
  //       principal: LAST_URL,
  //       category2: category2
  //     },
  //     dataType: 'JSON',
  //     success: function(result) {
  //       $('#category3').empty();
  //       $('#category3').append('<option selected="selected" value=""></option>');

  //       if (result[0].success) {
  //         var data = result[0].message;

  //         $.each(data, function(idx, elem) {
  //           var category_id = elem.md_category_id;
  //           var name = elem.category;

  //           $('#category3').append('<option value="' + category_id + '">' + name + '</option>');
  //         });
  //       } else {
  //         Swal.fire({
  //           type: 'error',
  //           title: result[0].message,
  //           timer: 1500
  //         });
  //       }
  //     },
  //     error: function(jqXHR, exception) {
  //       showError(jqXHR, exception);
  //     }
  //   });
  // });

  // $('.modal-product').click(function(evt) {
  //   var id = $(evt.currentTarget).attr('id');
  //   let url = '<?= base_url('backend/product/showBy/') ?>' + '/' + id;

  //   $.ajax({
  //     url: url,
  //     type: 'GET',
  //     dataType: 'JSON',
  //     success: function(result) {
  //       $('#modalProduct').modal('show')

  //       if (result[0].success) {
  //         var data = result[0].message;
  //         var html = '';
  //         $.each(data, function(idx, elem) {
  // console.log(elem.url)
  // html += '<div class="row align-items-center"> <div class="col-md-5">' +
  //   html = '<img src="' + img + '" alt="" class="img-fluid mb-4 mb-md-0">';
  //   </div>
  //   <div class="col-md-7">
  //     <h4 class="mb-2">Phillips Essentials</h4>
  //     <ul class="no-style">
  //       <li>Emergency function could be used up to 5 hours.</li>
  //       <li>Save energy up to 90% compared with regular incandescent bulbs.</li>
  //       <li>Can operate within 100 - 240 V.</li>
  //       <li>Instant start.</li>
  //       <li>Very good color rendering > 80.</li>
  //       <li>No IR & UV radiation.</li>
  //       <li>Frosted cover made of PC (Poly Carbonate), impact resistant.</li>
  //       <li>Made of PBT (Polybutylene terephthalate), heat resistant until 150º C.</li>
  //       <li>Long Life lamp up to 15'000 hours and Save Maintenance costs.</li>
  //       <li>Low heat radiation.</li>
  //     </ul>
  //     <h6 class="ecom-title">PRODUCT AVAILABLE ON</h6>
  //     <a href="" class="ecom"><img src="<?= base_url('adw/assets/images/tokped.png') ?>" alt=""></a>
  //     <a href="" class="ecom"><img src="<?= base_url('adw/assets/images/jdid.png') ?>" alt=""></a>
  //     <a href="" class="ecom"><img src="<?= base_url('adw/assets/images/shopee.png') ?>" alt=""></a>
  //   </div>
  // </div>
  //           console.log(elem.url)
  //         });
  //         $('.modal-body').html(html)

  //       } else {
  //         Swal.fire({
  //           type: 'error',
  //           title: result[0].message,
  //           timer: 1500
  //         });
  //       }
  //     },
  //     error: function(jqXHR, exception) {
  //       showError(jqXHR, exception);
  //     }
  //   });
  // });

  // $(document).ready(function() {
  //   $('#btn_filter').click(function() {
  //     var md_productgroup_id = $('#md_productgroup_id').val();
  //     $.ajax({
  //       url: "<?php echo base_url('MainController/filterProductgroup'); ?>",
  //       method: "POST",
  //       data: {
  //         md_productgroup_id: md_productgroup_id
  //       },
  //       async: false,
  //       dataType: 'json',
  //       success: function(data) {
  //         var html = '';
  //         var i;
  //         if (data.length > 0) {
  //           for (i = 0; i < data.length; i++) {
  //             html +=
  //               '<div class="col-md-4 col-lg-3">' +
  //               '<div class="item-product">' +
  //               '<a href="javascript:void(0);" data-toggle="modal" data-target="#modalProduct">' +
  //               '<div class="image-wrap">' +
  //               '<img src="<?= base_url('adw/assets/images/product1.png') ?>" alt="" class="img-fluid">' +
  //               '</div>' +
  //               '<h5>' + data[i].name + '</h5>' +
  //               '<p>Sort description about product</p>' +
  //               '</a>' +
  //               '</div>' +
  //               '</div>';
  //           }
  //         } else {
  //           html +=
  //             '<div class="col-md-4 col-lg-3">' +
  //             '<div class="item-product">' +
  //             '<div class="image-wrap">' +
  //             '<a href="javascript:void(0);">' +
  //             '<h5>No Product</h5>' +
  //             '</a>' +
  //             '</div>' +
  //             '</div>' +
  //             '</div>';
  //         }
  //         $('.card-product').html(html);
  //       }
  //     });
  //   });
  // });

  // $('.btn_filter').click(function(evt) {
  //   var html = '';
  //   $('.card-product').append('<div class="col-md-4 col-lg-3"><div class="item-product"><a href="javascript:void(0);" data-toggle="modal" data-target="#modalProduct"></a></div></div>');
  // })
</script>
<?= $this->endSection() ?>