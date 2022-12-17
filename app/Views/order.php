<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>

<div style="margin-top: 150px;">
  <div class="container">
    <div class="row header-text">
      <div class="col-lg-6">
        <div class="section-heading">
          <h2>Order The <em>Car</em></h2>
          <div class="line-dec"></div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="contact-us-content">
          <div class="row">
            <div class="col-md-8">
              <!-- card -->
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="section-heading">
                        <h2><em>Form</em> <span>Rent</span></h2>
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div class="row">
                        <div class="col-lg-6">
                          <img src="/assets/images/cars/<?= $car['image'] ?>" alt="car" class="img-fluid">
                        </div>
                        <div class="col-lg-6">
                          <h4><?= $car['brand'] ?></h4>

                          <br>
                          <p style="color: black;">Price: <?= $car['price_rupiah'] ?> / day</p>
                          <p style="color: black;">Color: <?= $car['color'] ?></p>
                          <br>

                          <form id="contact-form" action="/order/<?= $car['id'] ?>" method="post">
                            <div class="row">

                              <div class="col-lg-6">
                                <fieldset>
                                  <label class="form-label" for="dateStart">Start Date</label>
                                  <input type="date" name="date_start" id="dateStart">
                                </fieldset>
                              </div>
                              <div class="col-lg-6">
                                <fieldset>
                                  <label class="form-label" for="dateEnd">End Date</label>
                                  <input type="date" name="date_end" id="dateEnd">
                                </fieldset>
                              </div>
                              <div class="col-lg-12">
                                <fieldset>
                                  <label class="form-label" for="subTotal">Sub Total</label>
                                  <input type="text" name="" id="subTotal" value="<?= $car['price_rupiah'] ?>" disabled>
                                </fieldset>
                              </div>
                              <div class="col-lg-12">
                                <fieldset>
                                  <button type="submit" id="form-submit" class="orange-button">Book Now!!</button>
                                </fieldset>
                              </div>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- end card -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
  // default date start
  const dateStart = document.getElementById('dateStart');
  const dateEnd = document.getElementById('dateEnd');
  const subTotal = document.getElementById('subTotal');

  const today = new Date();

  const dateStartMin = today.toISOString().substr(0, 10);
  const dateStartMax = new Date(today.getFullYear(), today.getMonth(), today.getDate() + 7).toISOString().substr(0, 10);

  dateStart.value = dateStartMin;
  dateStart.setAttribute('min', dateStartMin);
  dateStart.setAttribute('max', dateStartMax);

  function dateStartChange() {
    const dateStartValue = new Date(dateStart.value);
    const dateEndMin = new Date(dateStartValue.getFullYear(), dateStartValue.getMonth(), dateStartValue.getDate() + 1, 7)
      .toISOString().substr(0, 10);
    const dateEndMax = new Date(dateStartValue.getFullYear(), dateStartValue.getMonth(), dateStartValue.getDate() + 7, 7)
      .toISOString().substr(0, 10);

    dateEnd.value = dateEndMin;
    dateEnd.setAttribute('min', dateEndMin);
    dateEnd.setAttribute('max', dateEndMax);
  }


  function dateEndChange() {
    const dateEndValue = new Date(dateEnd.value);
    const dateStartValue = new Date(dateStart.value);

    const diffTime = Math.abs(dateEndValue - dateStartValue);
    const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));

    const price = <?= $car['price'] ?>;
    const subTotalValue = diffDays * price;

    subTotal.value = subTotalValue.toLocaleString('id-ID', {
      style: 'currency',
      currency: 'IDR',
      minimumFractionDigits: 0
    });
  }

  dateStart.addEventListener('change', dateStartChange);
  dateEnd.addEventListener('change', dateEndChange);

  dateStartChange();
</script>
<?= $this->endSection() ?>