<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>

<div style="margin-top: 150px;">
  <div class="container">
    <div class="row">
      <div class="col-lg-6">
        <div class="section-heading">
          <h2>Choose <em>Your</em> favorite <span>car</span></h2>
          <div class="line-dec"></div>
        </div>
      </div>
    </div>
    <div class="row">
      <?php foreach ($cars as $car) : ?>
        <div class="col-md-6">
          <div class="card mb-3">
            <div class="row g-0">
              <div class="col-lg-4">
                <img src="assets/images/cars/<?= $car['image'] ?>" class="img-fluid rounded-start" alt="">
              </div>
              <div class="col-lg-8">
                <div class="card-body">
                  <h5 class="card-title"><?= $car['brand'] ?></h5>
                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>

<?= $this->endSection('content'); ?>