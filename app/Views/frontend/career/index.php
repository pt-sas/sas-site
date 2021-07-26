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
            <div class="image top" style="background-image: url('<?= base_url('adw/assets/images/news1.png') ?>');"></div>
            <div class="image bot" style="background-image: url('<?= base_url('adw/assets/images/news2.png') ?>');"></div>
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
        <div class="col-md-8">
          <div class="item-core">
            <img src="<?= base_url('adw/assets/images/ethics.png') ?>" alt="">
            <span><?= lang("Career.CSP31") ?></span>
          </div>
          <div class="item-core">
            <img src="<?= base_url('adw/assets/images/transparent.png') ?>" alt="">
            <span><?= lang("Career.CSP32") ?></span>
          </div>
          <div class="item-core">
            <img src="<?= base_url('adw/assets/images/professional.png') ?>" alt="">
            <span><?= lang("Career.CSP33") ?></span>
          </div>
          <div class="item-core">
            <img src="<?= base_url('adw/assets/images/group.png') ?>" alt="">
            <span><?= lang("Career.CSP34") ?></span>
          </div>
          <div class="item-core">
            <img src="<?= base_url('adw/assets/images/transparent.png') ?>" alt="">
            <span><?= lang("Career.CSP35") ?></span>
          </div>
          <div class="item-core">
            <img src="<?= base_url('adw/assets/images/professional.png') ?>" alt="">
            <span><?= lang("Career.CSP36") ?></span>
          </div>
          <div class="item-core">
            <img src="<?= base_url('adw/assets/images/group.png') ?>" alt="">
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
            <input type="search" class="form-control search" placeholder="Search">
            <select name="" id="" class="form-control">
              <!-- <option value="">All Division</option>
              <?php foreach ($division as $value) : ?>
                  <option value="<? //= $value->md_division_id
                                  ?>"><? //= $value->name
                                      ?></option>
              <?php endforeach; ?> -->
              <option value=""> </option>
              <option value="el">Entry-level </option>
              <option value="ml">Mid-level </option>
              <option value="sl">Senior-level </option>
            </select>
            <button class="btn btn-primary"><?= lang("Career.CBU41") ?></button>
          </div>

          <?php foreach ($job as $row) : ?>
            <div class="item-jobs">
              <div class="left-part">
                <h5><?= $row->position; ?></h5>
                <h6><?= $row->division_name; ?></h6>
              </div>
              <a href="javascript:void(0);" class="btn btn-outline-black view_details" data-md_division_id="<?= $row->division_name ?>" data-position="<?= $row->position ?>" data-city="<?= $row->city ?>"
                data-description="<?= $row->description ?>" data-requirement="<?= $row->requirement ?>" data-description_en="<?= $row->description_en ?>" data-requirement_en="<?= $row->requirement_en ?>"
                data-posted_date="<?= $row->posted_date ?>" data-expired_date="<?= $row->expired_date ?>" data-url="<?= $row->url ?>">
                Detail
              </a>
              <span class="location">
                <img src="<?= base_url('adw/assets/images/map-pin-s.png') ?>" alt="">
                DKI Jakarta
              </span>
            </div>
          <?php endforeach; ?>
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
            <img src="<?= base_url('adw/assets/images/file-text-w.png') ?>" alt="">
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
        <p>© Copyright 2021 PT Sahabat Abadi Sejahtera - All rights reserved.</p>
        <a href="javascript:void(0);" onclick="window.open('https://www.facebook.com/pages/PT.%20Sahabat%20Abadi%20Sejahtera/268648619839788/', '_blank')" class="foot-socmed"><i class="fa fa-facebook-f"></i></a>
        <a href="javascript:void(0);" onclick="window.open('https://www.youtube.com/channel/UCeB2XhHrFdFD3P1cw3Q9swg', '_blank')" class="foot-socmed"><i class="fa fa-youtube"></i></a>
        <a href="javascript:void(0);" onclick="window.open('https://www.linkedin.com/company/sahabat-abadi-sejahtera', '_blank')" class="foot-socmed"><i class="fa fa-linkedin"></i></a>
        <a href="javascript:void(0);" onclick="window.open('https://www.instagram.com/explore/locations/317814588/ptsahabat-abadi-sejahtera-philips-indonesia-sunter', '_blank')" class="foot-socmed"><i class="fa fa-instagram"></i></a>
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
        <h4 name="position"></h4>
        <h5>
          <span name="division"></span>
          <span name="posted_date"></span>
          <span><img src="<?= base_url('adw/assets/images/map-pin-s.png') ?>" alt=""> DKI Jakarta</span>
        </h5>
        <h6 class="title-list"><?= lang("Career.CH6M1") ?></h6>
        <?php if(session()->lang == 'id') { ?>
          <div name="description"></div>
        <?php } else { ?>
          <div name="description_en"></div>
        <?php } ?>
        <h6 class="title-list"><?= lang("Career.CH6M2") ?></h6>
        <?php if(session()->lang == 'id') { ?>
          <div name="requirement"></div>
        <?php } else { ?>
          <div name="requirement_en"></div>
        <?php } ?>
        <a href="" class="btn btn-primary url"><?= lang("Career.CBUM1") ?></a>
      </div>
    </div>
  </div>
</div>

<script>
  $(document).on('click', '.view_details', function(e) {
    e.preventDefault();
    var division = $(this).data('md_division_id');
    var position = $(this).data('position');
    var posted_date = moment($(this).data('posted_date')).format('LL');
    var description = $(this).data('description');
    var requirement = $(this).data('requirement');
    var description_en = $(this).data('description_en');
    var requirement_en = $(this).data('requirement_en');
    var url = $(this).data('url');

    $('#modalJobs').modal('show');
    $('[name="division"]').text(division);
    $('[name="position"]').text(position);
    $('[name="posted_date"]').text(posted_date);
    $('[name="description"]').html(description);
    $('[name="requirement"]').html(requirement);
    $('[name="description_en"]').html(description_en);
    $('[name="requirement_en"]').html(requirement_en);
    $('.url').attr("href", url);
  });
</script>
<?= $this->endSection() ?>
