<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>

<div class="main-banner" id="top">
  <div class="container">
    <div class="row">
      <div class="col-lg-7">
        <div class="caption header-text">
          <h6>RELIABLE CAR RENTAL SERVICES</h6>
          <div class="line-dec"></div>
          <h4>You <em>Need a Car</em> Quiet There<span>Car Rent Here</span></h4>
          <p>Car Rent Officer JL Meruya Selatan No 1
            Jakarta Barat
            Car Rent Scattered In Every Sub-District Area Jakarta Tangerang Depok Bekasi And Bogor
            So don't worry about ordering a car with us
            We provide car rental services for your needs during work or vacation visits, we provide various types of cars</p>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="projects section" id="projects">
  <div class="container">
    <div class="row">
      <div class="col-lg-6">
        <div class="section-heading">
          <h2>Try our recomended <em>Cars</em> for <span>you</span></h2>
          <div class="line-dec"></div>
        </div>
      </div>
    </div>
  </div>
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12 align-items-center">
        <div class="owl-features owl-carousel">
          <?php foreach ($cars as $car) : ?>
            <div class="item">
              <a href="/order/<?= $car['id'] ?>">
                <img src="assets/images/cars/<?= $car['image'] ?>" alt="" class="img-fluid">
                <div class="down-content">
                  <h4><?= $car['brand'] ?></h4>
                  <span class="price"><?= $car['price'] ?>/day</span>
                </div>
              </a>
            </div>
          <?php endforeach; ?>
        </div>
        <div class="d-flex justify-content-center">
          <div class="second-button scroll-to-section mt-5">
            <a href="/cars">Browse More</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="contact-us section" id="contact">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="contact-us-content">
          <div class="row">
            <div class="col-lg-8 ms-auto me-auto">
              <div id="map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d31731.098663072535!2d106.7357883!3d-6.2125391!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f71f5a41c197%3A0x628259f9e8d6d7b4!2sUniversitas%20Mercu%20Buana!5e0!3m2!1sid!2sid!4v1671297422256!5m2!1sid!2sid" width="100%" height="500px" frameborder="0" style="border:0; border-radius: 23px 23px 0px 0px;" allowfullscreen="">
                </iframe>
              </div>
              <div class="more-info">
                <div class="row">
                  <div class="col-lg-4">
                    <div class="info-item">
                      <i class="fa fa-phone"></i>
                      <h4><a href="#">+62 812 3456 7890</a></h4>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="info-item">
                      <i class="fa fa-envelope"></i>
                      <h4><a href="#">car-rent@email.com</a></h4>
                      <h4><a href="#">car-rent@email.com</a></h4>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="info-item">
                      <i class="fa fa-map-marker"></i>
                      <h4><a href="#">JL.Meruya Selatan, No.1, Jakarta Barat</a></h4>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<?= $this->endSection('content'); ?>