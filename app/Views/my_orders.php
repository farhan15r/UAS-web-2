<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>

<div style="margin-top: 150px;">
  <div class="container">
    <div class="row header-text">
      <div class="col-lg-6">
        <div class="section-heading">
          <h2>My Orders <em>Car</em></h2>
          <div class="line-dec"></div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="infos section mt-0" id="infos">
  <div class="container">
    <div class="row">
      <?php foreach ($orders as $order) : ?>
        <div class="col-lg-6 my-2">
          <div class="main-content">
            <div class="row">
              <div class="col-lg-6">
                <div class="">
                  <img src="assets/images/cars/<?= $order['car_image'] ?>" alt="">
                </div>
              </div>
              <div class="col-lg-6 mt-3">
                <h5><?= $order['car_brand'] ?></h5>
                <br>
                <span>Price: <?= $order['car_price'] ?> /day</span>
                <br>
                <span>Start Date: <?= $order['date_start'] ?></span>
                <br>
                <span>End Date: <?= $order['date_end'] ?></span>
                <br>
                <br>
                <span>Subtotal: <?= $order['subtotal'] ?></span>
                <br>
                <?php if ($order['status'] == 'Finished') : ?>
                  <span>Total Fine: <?= $order['total_fine'] ?></span>
                  <br>
                  <span>Total Payment: <?= $order['total'] ?></span>
                  <br>
                  <a class="btn price" href="invoice/<?= $order['id'] ?>">Invoice</a>
                <?php endif ?>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach ?>
    </div>
  </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>

</script>
<?= $this->endSection() ?>