<?= $this->extend('frontend/_partials/overview') ?>

<?= $this->section('content') ?>

<!-- hero -->
<div class="content">
  <div class="title-page">
    Career
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
          <h4>Why work with us</h4>
          <p>PT. Sahabat Abadi Sejahtera has been a leading and largest Philips Lighting stockiest for many years and has built a strong and reliable business relationship in the community through its consistent performance and has earned excellent reputation for its prompt settlement of business transactions.Being specialized with a focused marketing philosophy, excellent services and extensive distribution network in the region, PT. Sahabat Abadi Sejahtera is definitely the right business partner for Philips Lighting.</p>
        </div>
      </div>
    </div>
  </div>

  <!-- we are looking for -->
  <div class="half-half-wrap bordered-top">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <h4 class="left-title">We are looking for</h4>
        </div>
        <div class="col-md-8">
          <p>Members who are a team-player, full of enthusiasm and desire for continuous learning & improvements. If you want to be part of our fast-growing company, we’d love to hear from you.</p>
        </div>
      </div>
    </div>
  </div>

  <!-- our core value -->
  <div class="half-half-wrap bordered-top">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <h4 class="left-title">Our core value</h4>
        </div>
        <div class="col-md-8">
          <div class="item-core">
            <img src="<?= base_url('adw/assets/images/ethics.png') ?>" alt="">
            <span>Ethics</span>
          </div>
          <div class="item-core">
            <img src="<?= base_url('adw/assets/images/transparent.png') ?>" alt="">
            <span>Transparancy</span>
          </div>
          <div class="item-core">
            <img src="<?= base_url('adw/assets/images/professional.png') ?>" alt="">
            <span>Professionalism</span>
          </div>
          <div class="item-core">
            <img src="<?= base_url('adw/assets/images/group.png') ?>" alt="">
            <span>Teamwork</span>
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
          <h4 class="left-title">Search for available Jobs</h4>
        </div>
        <div class="col-md-8">
          <div class="filter-jobs">
            <input type="search" class="form-control search" placeholder="Search">
            <select name="" id="" class="form-control">
              <option value="">All Division</option>
              <option value="">Marketing & Communication</option>
            </select>
            <button class="btn btn-primary">Search</button>
          </div>
          <div class="item-jobs">
            <div class="left-part">
              <h5>Campaign Executive</h5>
              <h6>Marketing & Communication</h6>
            </div>
            <a href="javascript:void(0);" class="btn btn-outline-black" data-toggle="modal" data-target="#modalJobs">
              Detail
            </a>
            <span class="location">
              <img src="<?= base_url('adw/assets/images/map-pin-s.png') ?>" alt="">
              Jakarta
            </span>
          </div>
          <div class="item-jobs">
            <div class="left-part">
              <h5>Campaign Executive</h5>
              <h6>Marketing & Communication</h6>
            </div>
            <a href="javascript:void(0);" class="btn btn-outline-black" data-toggle="modal" data-target="#modalJobs">
              Detail
            </a>
            <span class="location">
              <img src="<?= base_url('adw/assets/images/map-pin-s.png') ?>" alt="">
              Jakarta
            </span>
          </div>
          <div class="item-jobs">
            <div class="left-part">
              <h5>Campaign Executive</h5>
              <h6>Marketing & Communication</h6>
            </div>
            <a href="javascript:void(0);" class="btn btn-outline-black" data-toggle="modal" data-target="#modalJobs">
              Detail
            </a>
            <span class="location">
              <img src="<?= base_url('adw/assets/images/map-pin-s.png') ?>" alt="">
              Jakarta
            </span>
          </div>
          <div class="item-jobs">
            <div class="left-part">
              <h5>Campaign Executive</h5>
              <h6>Marketing & Communication</h6>
            </div>
            <a href="javascript:void(0);" class="btn btn-outline-black" data-toggle="modal" data-target="#modalJobs">
              Detail
            </a>
            <span class="location">
              <img src="<?= base_url('adw/assets/images/map-pin-s.png') ?>" alt="">
              Jakarta
            </span>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- best cv -->
  <div class="half-half-wrap bordered-top pb-0">
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
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <footer>
        <p>© Copyright 2021 PT. Sahabat Abadi Sejahtera - All rights reserved.</p>
        <a href="" class="foot-socmed"><i class="fa fa-facebook-f"></i></a>
        <a href="" class="foot-socmed"><i class="fa fa-twitter"></i></a>
        <a href="" class="foot-socmed"><i class="fa fa-instagram"></i></a>
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
        <h4>Campaign Executive</h4>
        <h5>
          <span>Marketing & Communication</span>
          <span>1 April 2020 </span>
          <span><img src="<?= base_url('adw/assets/images/map-pin-s.png') ?>" alt=""> Jakarta</span>
        </h5>
        <h6 class="title-list">What you will do</h6>
        <ul>
          <li>execute campaign output using the assigned tools to bring the campaign execution to live.</li>
          <li>ensure available documents as reference point for various stakeholders.</li>
          <li>ensure a streamlined and efficient processes and possible improvement areas.</li>
          <li>Develop smart, actionable recommendations and reports that support business growth.</li>
          <li>Provide custom analyses requested.</li>
          <li>Able to lead small projects (with supervision/guidance)</li>
          <li>Work with various stakeholders</li>
          <li>Address business problems assigned to insights.</li>
          <li>Execute and continuously optimize campaign governance for owned-media</li>
          <li>Typically, individual contributors</li>
        </ul>
        <h6 class="title-list">What you will need</h6>
        <ul>
          <li>Min. 1-2 years of similar experiences, exp in doing campaign management is a plus point </li>
          <li>Detailed oriented</li>
          <li>Good communication and interpersonal skill</li>
          <li>Meticulous, structured and excellent at executing things</li>
          <li>Type of person that can cope and perform well-provided checklist/items in hands to be closed or implemented.</li>
        </ul>

        <button class="btn btn-primary">Apply Now</button>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>
