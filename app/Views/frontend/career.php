<?= $this->extend('frontend/_partials/overview') ?>

<?= $this->section('content') ?>

<!-- hero -->
<div class="content">
  <div class="title-page">
    <?= lang("Career.CD11") ?>
  </div>

  <!-- photo w text  -->
  <div class="photo-w-text">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-5">
          <div class="image-wrap">
            <div class="image" style="background-image: url('<?= base_url('custom/image/gudang.jpeg') ?>');width:100%;"></div>
          </div>
        </div>
        <div class="col-md-7">
          <h4><?= lang("Career.CH411") ?></h4>
          <p><?= lang("Career.CP11") ?></p>
        </div>
      </div>
    </div>
  </div>

  <!-- we are looking for -->
  <div class="half-half-wrap bordered-top">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <h4 class="left-title"><?= lang("Career.CH421") ?></h4>
        </div>
        <div class="col-md-8">
          <p><?= lang("Career.CP21") ?></p>
        </div>
      </div>
    </div>
  </div>

  <!-- our core value -->
  <div class="half-half-wrap bordered-top">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <h4 class="left-title"><?= lang("Career.CH431") ?></h4>
        </div>
        <div class="col-md-4">
          <div class="item-core">
            <img src="<?= base_url('custom/image/icon/law.png') ?>" style="max-width:36px;" alt="">
            <span><?= lang("Career.CSP31") ?></span>
          </div>
          <div class="item-core">
            <img src="<?= base_url('custom/image/icon/love.png') ?>" style="max-width:36px;" alt="">
            <span><?= lang("Career.CSP32") ?></span>
          </div>
          <div class="item-core">
            <img src="<?= base_url('custom/image/icon/support.png') ?>" style="max-width:36px;" alt="">
            <span><?= lang("Career.CSP33") ?></span>
          </div>
          <div class="item-core">
            <img src="<?= base_url('custom/image/icon/positive.png') ?>" style="max-width:36px;" alt="">
            <span><?= lang("Career.CSP34") ?></span>
          </div>
        </div>
        <div class="col-md-4">
          <div class="item-core">
            <img src="<?= base_url('custom/image/icon/team.png') ?>" style="max-width:36px;" alt="">
            <span><?= lang("Career.CSP35") ?></span>
          </div>
          <div class="item-core">
            <img src="<?= base_url('custom/image/icon/progress.png') ?>" style="max-width:36px;" alt="">
            <span><?= lang("Career.CSP36") ?></span>
          </div>
          <div class="item-core">
            <img src="<?= base_url('custom/image/icon/protection.png') ?>" style="max-width:36px;" alt="">
            <span><?= lang("Career.CSP37") ?></span>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- search jobs -->
  <div class="half-half-wrap bordered-top">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <h4 class="left-title"><?= lang("Career.CH441") ?></h4>
        </div>
        <div class="col-md-8">
          <div class="filter-jobs">
            <input type="search" class="form-control search" placeholder="Search" name="keyword">
            <select class="form-control" name="level" id="level">
              <option value="">All Level</option>
              <option value="EL">Entry Level</option>
              <option value="ML">Mid Level</option>
              <option value="SL">Senior Level</option>
            </select>
            <button class="btn btn-primary btn_search"><?= lang("Career.CBU41") ?></button>
          </div>

          <div id="detail-jobs">
            <?php if (count($job) > 0) { ?>
              <?php foreach ($job as $row) : ?>
                <div class="item-jobs">
                  <div class="left-part">
                    <h5><?= $row->position; ?></h5>
                    <h6><?= $row->division_name; ?></h6>
                  </div>
                  <a href="javascript:void(0);" class="btn btn-outline-black view_details" id="<?= $row->trx_job_id ?>">
                    Detail
                  </a>
                  <span class="location">
                    <img src="<?= base_url('adw/assets/images/map-pin-s.png') ?>" alt="">
                    Jakarta
                  </span>
                </div>
              <?php endforeach; ?>
            <?php } else { ?>
              <div class="item-jobs">
                <div class="col-md-12">
                  <h5><?= session()->lang == 'id' ? 'Pekerjaan tidak tersedia.' : 'Jobs not available.' ?></h5>
                </div>
              </div>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- best cv -->
  <!-- <div class="half-half-wrap bordered-top pb-0">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <h4 class="left-title">Drop your best CV</h4>
        </div>
        <div class="col-md-8">
          <a href="" class="btn btn-primary">
            <img src="<?= base_url('custom/image/icon/file-text-w.png') ?>" alt="">
            Drop CV Here
          </a>
        </div>
      </div>
    </div>
  </div> -->
</div>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <footer>
        <?= $this->include('frontend/_partials/footer'); ?>
      </footer>
    </div>
  </div>
</div>

<div class="modal fade" id="modalJobs" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <img src="<?= base_url('adw/assets/images/close.png') ?>" alt="">
        </button>
        <div id="content-modal"></div>
      </div>
    </div>
  </div>
</div>

<script>
  $(document).on('click', '.view_details', function(evt) {
    let id = $(evt.target).attr('id');
    let html = '';

    url = '<?= base_url('MainController/getPositionBy'); ?>' + '/' + id;

    $.ajax({
      url: url,
      type: 'GET',
      cache: false,
      dataType: 'JSON',
      beforeSend: function() {
        loadingForm('modalJobs', 'bounce');
      },
      complete: function() {
        hideLoadingForm('modalJobs');
      },
      success: function(result) {
        if (result[0].success) {
          var data = result[0].message;

          $.each(data, function(idx, elem) {
            html += '<h4>' + elem.position + '</h4>';
            html += '<h5>' +
              '<span>' + elem.division_name + '</span>' +
              '<span>' + moment($(this).data(elem.posted_date)).format('LL') + '</span>' +
              '<span><img src="<?= base_url('adw/assets/images/map-pin-s.png') ?>" alt=""> DKI Jakarta</span>' +
              '</h5>';
            html += '<h6 class="title-list"><?= lang("Career.CH6M1") ?></h6>' +
              '<div>' + (sessLang == 'id' ? elem.description : elem.description_en) + '</div>' +
              '<h6 class="title-list"><?= lang("Career.CH6M2") ?></h6>' +
              '<div>' + (sessLang == 'id' ? elem.requirement : elem.requirement_en) + '</div>';
            html += '<a href="' + elem.url + '" class="btn btn-primary" target="_blank"><?= lang("Career.CBUM1") ?></a>';
          });

          $('#content-modal').html(html);
          $('#modalJobs').modal('show');
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

  $('.btn_search').click(function(evt) {
    let html = '';
    url = '<?= base_url('MainController/filterLevel'); ?>';
    var level = $('[name = "level"]').val();
    var keyword = $('[name = "keyword"]').val();

    $.ajax({
      url: url,
      type: 'POST',
      data: {
        level: level,
        keyword: keyword
      },
      cache: false,
      dataType: 'JSON',
      beforeSend: function() {
        $(this).prop('disabled', true);
        loadingForm('detail-jobs', 'bounce');
      },
      complete: function() {
        $(this).removeAttr('disabled');
        hideLoadingForm('detail-jobs');
      },
      success: function(result) {
        if (result[0].success) {
          var data = result[0].message;
          if (data.length > 0) {
            $.each(data, function(idx, elem) {
              html += '<div class="item-jobs">';
              html += '<div class="left-part">' +
                '<h5>' + elem.position + '</h5>' +
                '<h6>' + elem.division_name + '</h6>' +
                '</div>' +
                '<a href="javascript:void(0);" class="btn btn-outline-black view_details" id="' + elem.trx_job_id + '">' +
                'Detail' +
                '</a>' +
                '<span class="location">' +
                '<img src="' + '<?= base_url('adw/assets/images/map-pin-s.png') ?>' + '" alt="">' +
                'DKI Jakarta' +
                '</span>' +
                '</div>';
            });
          } else {
            html += '<div class="item-jobs">' +
              '<div class="col-md-12">' +
              '<h5>' + (sessLang == 'id' ? 'Pekerjaan tidak tersedia.' : 'Jobs not available.') + '</h5>' +
              '</div></div>';
          }

          $('#detail-jobs').html(html);

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