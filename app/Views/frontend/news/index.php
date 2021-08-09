<?= $this->extend('frontend/_partials/overview') ?>

<?= $this->section('content') ?>

<!-- hero -->
<div class="content">
  <div class="title-page">
    <?= lang("News.ND11") ?>
  </div>

  <!-- news  -->
  <div class="news-page-wrap">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h5 class="sec-title"><?= lang("News.NH511") ?></h5>
        </div>
        <?php foreach ($news as $row) : ?>
          <div class="col-md-4">
            <a href="<?= base_url('/news/' . $row->slug . '') ?>" class="item-news">
              <div class="image" style="background-image: url('<?= base_url($row->image_url) ?>');"></div>
              <h5><?= session()->lang == 'id' ? $row->title : $row->title_en ?></h5>
              <span><?= session()->lang == 'id' ? format_idn($row->news_date) : date("F jS, Y", strtotime($row->news_date)) ?></span>
            </a>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>

  <!-- promo -->
  <div class="promo-wrap bordered-top">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h5 class="sec-title"><?= lang("News.NH521") ?></h5>
        </div>
        <?php foreach ($promo as $row) : ?>
          <div class="col-md-4">
            <a href="<?= base_url('/event/' . $row->slug . '') ?>" class="item-promo">
              <div class="image" style="background-image: url('<?= base_url($row->image_url) ?>');">
                <div class="periode">
                  <span><?= lang("News.NSP21") ?></span>
                  <p><?= session()->lang == 'id' ? format_idn(date('Y-m-d', strtotime($row->start_date))) . " - " . format_idn(date('Y-m-d', strtotime($row->end_date)))  : date("F jS, Y", strtotime($row->start_date)) . " - " . date("F jS, Y", strtotime($row->end_date)) ?></p>
                </div>
              </div>
              <h6><?= session()->lang == 'id' ? $row->title : $row->title_en ?></h6>
            </a>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
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
<?= $this->endSection() ?>