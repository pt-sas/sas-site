<?= $this->extend('frontend/_partials/overview') ?>

<?= $this->section('content') ?>
<!-- header fixed -->
<div class="product-head fixed d-none">
  <div class="container">
    <div class="row">
      <form>
        <div class="form-row align-items-center">
          <div class="col-auto">
            <label for="filter-product">Filter :</label>
          </div>
          <div class="col-auto">
            <select class="form-control" name="fix_category1" id="fix_category1">
              <option value="">All Categories</option>
              <?php foreach ($category1 as $row) : ?>
                <option value="<?= $row->md_category_id ?>"><?= $row->category ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="col-auto">
            <select class="form-control" name="fix_category2" id="fix_category2">
              <option value="">All Sub Categories 1</option>
            </select>
          </div>
          <div class="col-auto">
            <select class="form-control" name="fix_category3" id="fix_category3">
              <option value="">All Sub Categories 2</option>
            </select>
          </div>
          <div class="col-auto">
            <button type="button" class="btn btn-primary btn_filter">Filter</button>
          </div>
        </div>
      </form>
      <!-- <a href="<?= base_url('product/compare') ?>" class="btn btn-white">COMPARE PRODUCT</a> -->
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
          <?php if (session()->lang == 'id') { ?>
            <h2>Produk <?= $principal->name ?></h2>
          <?php } else { ?>
            <h2><?= $principal->name ?> Products</h2>
          <?php } ?>
          <!-- <a href="<?= base_url('product/compare') ?>" class="btn btn-white">COMPARE PRODUCT</a> -->
        </div>
        <div class="product-filter">
          <form>
            <div class="form-row align-items-center">
              <div class="col-auto">
                <label for="filter-product">Filter :</label>
              </div>
              <div class="col-auto">
                <select class="form-control" name="category1" id="category1">
                  <option value="">All Categories</option>
                  <?php foreach ($category1 as $row) : ?>
                    <option value="<?= $row->md_category_id ?>"><?= $row->category ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="col-auto">
                <select class="form-control" name="category2" id="category2">
                  <option value="">All Sub Categories 1</option>
                </select>
              </div>
              <div class="col-auto">
                <select class="form-control" name="category3" id="category3">
                  <option value="">All Sub Categories 2</option>
                </select>
              </div>
              <div class="col-auto">
                <button type="button" class="btn btn-primary btn_filter">Filter</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- news  -->
  <div class="product-wrap">
    <div class="container">
      <div class="row" id="card-product">
        <div class="col-md-12 text-center m-lg-5">
          <!-- <button class="btn btn-whites mt-3">Load More <img src="assets/images/loader.png" alt="" class="spinning" /></button> -->
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


<!-- Modal -->
<div class="modal fade" id="modalProduct" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-body" id="product-modal">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <img src="<?= base_url('adw/assets/images/close.png') ?>" alt="">
        </button>
        <div class="row align-items-center" id="detail-product">
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  // var userScroll = $(document).scrollTop();
  // $(window).on('scroll', function() {
  //   var newScroll = $(document).scrollTop();
  //   if (userScroll - newScroll > 250 || newScroll - userScroll > 250) {
  //     $(".product-head.fixed").removeClass('d-none');
  //   } else {
  //     $(".product-head.fixed").addClass('d-none');
  //   }
  // })
</script>

<script type="text/javascript">
  var SITE_URL = window.location.href;
  var LAST_URL = SITE_URL.substr(SITE_URL.lastIndexOf('/') + 1); //the last url

  let url;

  $('#category1').change(function(evt) {
    var category1 = $(this).val();
    url = '<?= base_url('MainController/getCategory') ?>';

    $.ajax({
      url: url,
      type: 'POST',
      data: {
        principal: LAST_URL,
        category1: category1
      },
      dataType: 'JSON',
      success: function(result) {
        $('#category2').empty();
        $('#category3').empty();
        $('#category2').append('<option selected="selected" value="">All Sub Categories 1</option>');
        $('#category3').append('<option selected="selected" value="">All Sub Categories 2</option>');

        if (result[0].success) {
          var data = result[0].message;

          $.each(data, function(idx, elem) {
            var category_id = elem.md_category_id;
            var name = elem.category;

            $('#category2').append('<option value="' + category_id + '">' + name + '</option>');
          });
        } else {
          Swal.fire({
            type: 'error',
            title: result[0].message,
            showConfirmButton: false,
            timer: 1500
          });
        }
      },
      error: function(jqXHR, exception) {
        showError(jqXHR, exception);
      }
    });
  });

  $('#category2').change(function(evt) {
    var category2 = $(this).val();
    url = '<?= base_url('MainController/getCategory') ?>';

    $.ajax({
      url: url,
      type: 'POST',
      data: {
        principal: LAST_URL,
        category2: category2
      },
      dataType: 'JSON',
      success: function(result) {
        $('#category3').empty();
        $('#category3').append('<option selected="selected" value="">All Sub Categories 2</option>');

        if (result[0].success) {
          var data = result[0].message;

          $.each(data, function(idx, elem) {
            var category_id = elem.md_category_id;
            var name = elem.category;

            $('#category3').append('<option value="' + category_id + '">' + name + '</option>');
          });
        } else {
          Swal.fire({
            type: 'error',
            title: result[0].message,
            showConfirmButton: false,
            timer: 1500
          });
        }
      },
      error: function(jqXHR, exception) {
        showError(jqXHR, exception);
      }
    });
  });

  $('.btn_filter').click(function(evt) {
    var html = '';
    url = '<?php echo base_url('MainController/filterCategory'); ?>';
    var category1 = $('#category1').val();
    var category2 = $('#category2').val();
    var category3 = $('#category3').val();

    $.ajax({
      url: url,
      type: 'POST',
      data: {
        principal: LAST_URL,
        category1: category1,
        category2: category2,
        category3: category3,
      },
      cache: false,
      dataType: 'JSON',
      beforeSend: function() {
        $(this).prop('disabled', true);
        loadingForm('card-product', 'bounce');
      },
      complete: function() {
        $(this).removeAttr('disabled');
        hideLoadingForm('card-product');
      },
      success: function(result) {
        console.log(result)
        if (result[0].success) {
          var data = result[0].message;

          $.each(data, function(idx, elem) {
            var src = '';
            if (elem.url !== '') {
              var src = '<?= base_url() ?>' + '/custom/image/product/' + elem.url;
            }

            html += '<div class="col-md-4 col-lg-3">';
            html += '<div class="item-product" data-aos="fade-left">';
            html += '<a href="javascript:void(0);" title="' + elem.name + '" onclick="openDetailProduct(' + "'" + elem.code + "'" + ')">' +
              '<div class="image-wrap">' +
              '<img src="' + src + '" alt="" class="img-fluid">' +
              '</div>' +
              '<h5>' + elem.name + '</h5>' +
              '<p>Sort description about product</p>' +
              '</a>' +
              '</div>' +
              '</div>';
          });

          $('#card-product').html(html);

        } else {
          Swal.fire({
            type: 'info',
            title: result[0].message,
            showConfirmButton: false,
            timer: 2000
          });
        }
      },
      error: function(jqXHR, exception) {
        showError(jqXHR, exception);
      }
    });
  })

  function openDetailProduct(code) {
    url = '<?= base_url('backend/Product/showBy/') ?>' + '/' + code;
    var html = '';

    $.ajax({
      url: url,
      type: 'GET',
      dataType: 'JSON',
      beforeSend: function() {
        loadingForm('product-modal', 'bounce');
      },
      complete: function() {
        hideLoadingForm('product-modal');
      },
      success: function(result) {
        $('#modalProduct').modal('show')

        if (result[0].success) {
          var data = result[0].message;

          $.each(data, function(idx, elem) {
            var src = '';

            if (elem.url !== '') {
              var src = '<?= base_url() ?>' + '/custom/image/product/' + elem.url;
            }

            html += '<div class="col-md-5">' +
              '<img src="' + src + '" alt="" class="img-fluid mb-4 mb-md-0">' +
              '</div>' +
              '<div class="col-md-7">';
            html += '<h4 class="mb-2">' + elem.name + '</h4>';
            html += '<ul class="no-style">' +
              elem.description +
              '</ul>';

            if (elem.url_toped !== '' || elem.url_jdid !== '' || elem.url_shopee !== '') {
              html += '<h6 class="ecom-title">PRODUCT AVAILABLE ON</h6>';
            }

            if (elem.url_toped !== '') {
              html += '<a href="' + elem.url_toped + '" target="_blank" class="ecom"><img src="<?= base_url('adw/assets/images/tokped.png') ?>" alt=""></a>';
            }

            if (elem.url_jdid !== '') {
              html += '<a href="' + elem.url_jdid + '" target="_blank" class="ecom"><img src="<?= base_url('adw/assets/images/jdid.png') ?>" alt=""></a>';
            }

            if (elem.url_shopee !== '') {
              html += '<a href="' + elem.url_shopee + '" target="_blank" class="ecom"><img src="<?= base_url('adw/assets/images/shopee.png') ?>" alt=""></a>';
            }

            html += '</div>';
          });

          $('#detail-product').html(html)

        } else {
          Swal.fire({
            type: 'error',
            title: result[0].message,
            showConfirmButton: false,
            timer: 1500
          });
        }
      },
      error: function(jqXHR, exception) {
        showError(jqXHR, exception);
      }
    });
  }
</script>
<?= $this->endSection() ?>