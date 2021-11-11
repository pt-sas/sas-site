<?= $this->extend('frontend/_partials/overview') ?>

<?= $this->section('content') ?>
<!-- header fixed -->
<div class="product-head fixed d-none">
  <div class="container">
    <div class="row">
      <div class="form-row align-items-center">
        <div class="col-auto">
          <input class="form-control search" type="search" placeholder="Search" name="keyword">
        </div>
        <div class="col-auto category1">
          <select class="form-control" name="category1" id="fix_category1">
            <option value=""><?= session()->lang == 'id' ? 'Semua Kategori 1' : 'All Categories 1' ?></option>
            <?php foreach ($category1 as $row) : ?>
              <option value="<?= $row->md_category_id ?>"><?= session()->lang == 'id' ? $row->category : $row->category_en ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="col-auto category2">
          <select class="form-control" name="category2" id="fix_category2">
            <option value=""><?= session()->lang == 'id' ? 'Semua Kategori 2' : 'All Categories 2' ?></option>
          </select>
        </div>
        <div class="col-auto category3">
          <select class="form-control" name="category3" id="fix_category3">
            <option value=""><?= session()->lang == 'id' ? 'Semua Kategori 3' : 'All Categories 3' ?></option>
          </select>
        </div>
        <div class="col-auto">
          <button type="button" class="btn btn-primary btn_filter">Filter</button>
        </div>
      </div>
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
          <div class="form-row align-items-center">
            <div class="col-auto">
              <input class="form-control search" type="search" placeholder="Search" name="keyword" id="keyword">
            </div>
            <div class="col-auto category1">
              <select class="form-control" name="category1">
                <option value=""><?= session()->lang == 'id' ? 'Semua Kategori 1' : 'All Categories 1' ?></option>
                <?php foreach ($category1 as $row) : ?>
                  <option value="<?= $row->md_category_id ?>"><?= session()->lang == 'id' ? $row->category : $row->category_en ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="col-auto category2">
              <select class="form-control" name="category2">
                <option value=""><?= session()->lang == 'id' ? 'Semua Kategori 2' : 'All Categories 2' ?></option>
              </select>
            </div>
            <div class="col-auto category3">
              <select class="form-control" name="category3">
                <option value=""><?= session()->lang == 'id' ? 'Semua Kategori 3' : 'All Categories 3' ?></option>
              </select>
            </div>
            <div class="col-auto">
              <button type="button" class="btn btn-primary btn_filter">Filter</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- news  -->
  <div class="product-wrap">
    <div class="container">
      <div class="row" id="card-product">
        <?php foreach ($product as $row) : ?>
          <div class="col-md-4 col-lg-3">
            <div class="item-product" data-aos="fade-left">
              <a href="javascript:void(0);" title="<?= $row->name ?>" onclick="openDetailProduct('<?= $row->code ?>')">
                <div class="image-wrap">
                  <img src="<?= base_url('/custom/image/product/' . $row->url) ?>" alt="" class="img-fluid">
                </div>
                <h5><?= $row->name; ?></h5>
                <!-- <p>Sort description about product</p> -->
              </a>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
      <div class="col-md-12 text-center" id="btn-load">
        <button class="btn btn-whites mt-3 load_more">More New Items Weekly <img alt="" class="spinning" /></button>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <footer class="white">
          <?= $this->include('frontend/_partials/footer'); ?>
        </footer>
      </div>
    </div>
  </div>
</div>
<a href="javascript:void(0);" class="scroll-to-top" role="button" onclick="window.scrollTo({top: 0, behavior: 'smooth'});"><i class="fa fa-chevron-up"></i></a>


<!-- Modal -->
<div class="modal fade" id="modalProduct" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-body" id="product-modal">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <img src="<?= base_url('adw/assets/images/close.png') ?>" alt="">
        </button>
        <div class="row align-items-top" id="detail-product">
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  var userScroll = $(document).scrollTop();
  $(window).on('scroll', function() {
    var newScroll = $(document).scrollTop();
    if (userScroll - newScroll > 250 || newScroll - userScroll > 250) {
      $(".product-head.fixed").removeClass('d-none');
    } else {
      $(".product-head.fixed").addClass('d-none');
    }
  })

  $('input, select').on('change keyup', function(evt) {
    let parent = $(evt.currentTarget);
    $('[name = "' + parent.attr('name') + '"]').val(this.value);
  });
</script>

<script type="text/javascript">
  let SITE_URL = window.location.href;
  let LAST_URL = SITE_URL.substr(SITE_URL.lastIndexOf('/') + 1); //the last url

  let url,
    action = '',
    limit = parseInt('<?= $limit_product ?>'),
    offset = 0,
    calcLimit = 0;

  $('.category2').css('display', 'none');
  $('.category3').css('display', 'none');

  $('[name = "category1"]').change(function(evt) {
    let category1 = $(this).val();
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
        $('.category2').css('display', 'none');
        $('.category3').css('display', 'none');
        $('[name = "category2"]').empty();
        $('[name = "category3"]').empty();
        $('[name = "category2"]').append('<option selected="selected" value="">' + (sessLang == 'id' ? 'Semua Kategori 2' : 'All Categories 2') + '</option>');
        $('[name = "category3"]').append('<option selected="selected" value="">' + (sessLang == 'id' ? 'Semua Kategori 3' : 'All Categories 3') + '</option>');

        if (result[0].success) {
          if (category1 !== '') {
            var data = result[0].message;

            $('.category2').css('display', 'block');

            $.each(data, function(idx, elem) {
              var category_id = elem.md_category_id;
              var category = elem.category;
              var category_en = elem.category_en;

              $('[name = "category2"]').append('<option value="' + category_id + '">' + (sessLang == 'id' ? category : category_en) + '</option>');
            });
          }
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

  $('[name = "category2"]').change(function(evt) {
    let category2 = $(this).val();
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
        $('.category3').css('display', 'none');
        $('[name = "category3"]').empty();
        $('[name = "category3"]').append('<option selected="selected" value="">' + (sessLang == 'id' ? 'Semua Kategori 3' : 'All Categories 3') + '</option>');

        if (result[0].success) {
          if (category2 !== '') {
            var data = result[0].message;

            $('.category3').css('display', 'block');

            $.each(data, function(idx, elem) {
              var category_id = elem.md_category_id;
              var category = elem.category;
              var category_en = elem.category_en;

              $('[name = "category3"]').append('<option value="' + category_id + '">' + (sessLang == 'id' ? category : category_en) + '</option>');
            });
          }
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
    url = '<?php echo base_url('MainController/filterCategory'); ?>';
    let html = '';
    let html2 = '';
    let category1 = $('[name = "category1"]').val();
    let category2 = $('[name = "category2"]').val();
    let category3 = $('[name = "category3"]').val();
    let keyword = $('[name = "keyword"]').val();

    action = $(evt.target).text();

    $.ajax({
      url: url,
      type: 'POST',
      data: {
        principal: LAST_URL,
        category1: category1,
        category2: category2,
        category3: category3,
        keyword: keyword,
        limit: limit,
        action: action
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
        if (result.data[0].success) {
          let data = result.data[0].message;

          if (data.length > 0) {
            $.each(data, function(idx, elem) {
              var src = '';
              if (elem.url !== '') {
                src = '<?= base_url() ?>' + '/custom/image/product/' + elem.url;
              } else {
                src = 'https://via.placeholder.com/200/808080/ffffff?text=No+Image';
              }

              html += '<div class="col-md-4 col-lg-3">';
              html += '<div class="item-product" data-aos="fade-left">';
              html += '<a href="javascript:void(0);" title="' + elem.name + '" onclick="openDetailProduct(' + "'" + elem.code + "'" + ')">' +
                '<div class="image-wrap">' +
                '<img src="' + src + '" alt="" class="img-fluid">' +
                '</div>' +
                '<h5>' + elem.name + '</h5>' +
                // '<p>Sort description about product</p>' +
                '</a>' +
                '</div>' +
                '</div>';
            });

            // Set value countPage after added
            calcLimit = parseInt(result.limit);

            // Set value pffset first time after filter button click 
            offset = limit + 1;

            if (data.length < limit) {
              $('.load_more').css('display', 'none');
            } else {
              html2 += '<button class="btn btn-whites mt-3 load_more">More New Items Weekly <img alt="" class="spinning" /></button>';
            }

          } else {
            html += '<div class="col-md-4 col-lg-3">';
            html += '<div class="item-product" data-aos="fade-left">';
            html += '<div class="product-head">';
            html += '<h5 class="text-white">' + (sessLang == 'id' ? 'Produk tidak ditemukan.' : 'Product not found.') + '</h5>';
            html += '</div>' +
              '</div>' +
              '</div>';

            $('.load_more').css('display', 'none');
          }

          $('#card-product').html(html);
          $('#btn-load').html(html2);
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
    url = '<?= base_url('MainController/showProductBy/') ?>' + '/' + code;
    let html = '';

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
        if (result[0].success) {
          let data = result[0].message;

          $.each(data, function(idx, elem) {
            let src = '';

            if (elem.url !== '') {
              src = '<?= base_url() ?>' + '/custom/image/product/' + elem.url;
            } else {
              src = 'https://via.placeholder.com/200/808080/ffffff?text=No+Image';
            }

            html += '<div class="col-md-5">' +
              '<img src="' + src + '" alt="" class="img-fluid mb-4 mb-md-0">' +
              '</div>' +
              '<div class="col-md-7">';
            html += '<h4 class="mb-2">' + elem.name + '</h4>';
            html += '<ul class="no-style">' +
              elem.description + '</ul>';

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

          $('#detail-product').html(html);

          $('#modalProduct').modal('show');
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


  $(document).on('click', '.load_more', function(evt) {
    url = '<?php echo base_url('MainController/filterCategory'); ?>';

    let btnText = $(this).text();
    let html = '';
    let html2 = '';

    let category1 = $('[name = "category1"]').val();
    let category2 = $('[name = "category2"]').val();
    let category3 = $('[name = "category3"]').val();
    let keyword = $('[name = "keyword"]').val();

    $.ajax({
      url: url,
      type: 'POST',
      data: {
        principal: LAST_URL,
        category1: category1,
        category2: category2,
        category3: category3,
        keyword: keyword,
        limit: limit,
        offset: offset,
        calcLimit: calcLimit,
        action: action
      },
      cache: false,
      dataType: 'JSON',
      beforeSend: function() {
        $(this).attr('disabled', true);
        $('.spinning').attr('src', '<?= base_url('adw/assets/images/loader.png') ?>');
      },
      complete: function() {
        $(this).removeAttr('disabled');
        $('.spinning').removeAttr('src');
      },
      success: function(result) {
        if (result.data[0].success) {
          let data = result.data[0].message;

          $.each(data, function(idx, elem) {
            let src = '';
            if (elem.url !== '') {
              src = '<?= base_url() ?>' + '/custom/image/product/' + elem.url;
            } else {
              src = 'https://via.placeholder.com/200/808080/ffffff?text=No+Image';
            }

            html += '<div class="col-md-4 col-lg-3">';
            html += '<div class="item-product" data-aos="fade-left">';
            html += '<a href="javascript:void(0);" title="' + elem.name + '" onclick="openDetailProduct(' + "'" + elem.code + "'" + ')">' +
              '<div class="image-wrap">' +
              '<img src="' + src + '" alt="" class="img-fluid">' +
              '</div>' +
              '<h5>' + elem.name + '</h5>' +
              // '<p>Sort description about product</p>' +
              '</a>' +
              '</div>' +
              '</div>';
          });

          $('#card-product').append(html);

          if (data.length == 0)
            $('.load_more').css('display', 'none');

          // Calculation limit
          calcLimit = parseInt(result.limit) + limit;
          offset = calcLimit + 1;

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
  });
</script>
<?= $this->endSection() ?>