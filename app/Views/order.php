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

                          <form id="contact-form" action="" method="post">
                            <div class="row">

                              <div class="col-lg-6">
                                <fieldset>
                                  <label class="form-label" for="dateStart">Start Date</label>
                                  <input type="date" name="" id="dateStart">
                                </fieldset>
                              </div>
                              <div class="col-lg-6">
                                <fieldset>
                                  <label class="form-label" for="dateEnd">End Date</label>
                                  <input type="date" name="" id="dateEnd">
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
                                  <button type="submit" id="form-submit" class="orange-button">Send Message Now</button>
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

  const dd = String(today.getDate()).padStart(2, '0');
  const mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
  const yyyy = today.getFullYear();

  const minDateStart = yyyy + '-' + mm + '-' + dd;
  const maxDateStart = yyyy + '-' + mm + '-' + (parseInt(dd) + 7);

  dateStart.value = minDateStart;
  dateStart.setAttribute('min', minDateStart);
  dateStart.setAttribute('max', maxDateStart);

  function dateStartChange() {
    const dateStartValue = dateStart.value;

    const dd = String(dateStartValue.split('-')[2]).padStart(2, '0');
    const mm = String(dateStartValue.split('-')[1]).padStart(2, '0'); //January is 0!
    const yyyy = dateStartValue.split('-')[0];

    const minDateEnd = yyyy + '-' + mm + '-' + (parseInt(dd) + 1);
    const maxDateEnd = yyyy + '-' + mm + '-' + (parseInt(dd) + 8);

    dateEnd.value = minDateEnd;
    dateEnd.setAttribute('min', minDateEnd);
    dateEnd.setAttribute('max', maxDateEnd);
  }

  function dateEndChange() {
    const dateStartValue = document.getElementById('dateStart').value;
    const dateEndValue = document.getElementById('dateEnd').value;

    const ddStart = String(dateStartValue.split('-')[2]).padStart(2, '0');
    const mmStart = String(dateStartValue.split('-')[1]).padStart(2, '0'); //January is 0!
    const yyyyStart = dateStartValue.split('-')[0];

    const ddEnd = String(dateEndValue.split('-')[2]).padStart(2, '0');
    const mmEnd = String(dateEndValue.split('-')[1]).padStart(2, '0'); //January is 0!
    const yyyyEnd = dateEndValue.split('-')[0];

    const dateStart = new Date(yyyyStart, mmStart, ddStart);
    const dateEnd = new Date(yyyyEnd, mmEnd, ddEnd);

    const diffTime = Math.abs(dateEnd - dateStart);
    const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));

    const sum = diffDays * <?= $car['price'] ?>;
    subTotal.value = sum.toLocaleString('id-ID', {
      style: 'currency',
      currency: 'IDR',
    });
  }

  dateStart.addEventListener('change', dateStartChange);
  dateEnd.addEventListener('change', dateEndChange);

  dateStartChange();
</script>
<?= $this->endSection() ?>