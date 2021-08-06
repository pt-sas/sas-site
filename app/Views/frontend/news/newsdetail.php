<?= $this->extend('frontend/_partials/overview') ?>

<?= $this->section('content') ?>

<!-- hero -->
<div class="content">

  <!-- news detail -->
  <div class="news-detail-wrap">
    <div class="container">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('/news') ?>"><?= lang("NewsDetail.NDBR11") ?></a></li>
            <li class="breadcrumb-item active" aria-current="page">
              <?= session()->lang == 'id' ? $news->title : $news->title_en ?>
            </li>
          </ol>
          <h4><?= session()->lang == 'id' ? $news->title : $news->title_en ?></h4>
          <small><?= session()->lang == 'id' ? format_idn($news->news_date) : date("F jS, Y", strtotime($news->news_date)) ?></small>
          <div class="image my-4" style="background-image: url('<?= base_url($news->image_url) ?>');"></div>
          <?= session()->lang == 'id' ? $news->content : $news->content_en ?>
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
<?= $this->endSection() ?>