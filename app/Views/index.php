<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>

<div class="main-banner" id="top">
  <div class="container">
    <div class="row">
      <div class="col-lg-7">
        <div class="caption header-text">
          <h6>SEO DIGITAL AGENCY</h6>
          <div class="line-dec"></div>
          <h4>Dive <em>Into The SEO</em> World <span>With Tale</span></h4>
          <p>Tale is the best SEO agency website template using Bootstrap v5.2.2 CSS for your company. It is a free
            download provided by TemplateMo. There are 3 HTML pages, <a href="index.html">Home</a>, <a href="about.html">About</a>, and <a href="faqs.html">FAQ</a>.</p>
          <div class="main-button scroll-to-section"><a href="#services">Discover More</a></div>
          <span>or</span>
          <div class="second-button"><a href="faqs.html">Check our FAQs</a></div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="services section" id="services">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 offset-lg-6">
        <div class="row">
          <div class="col-lg-12">
            <div class="section-heading">
              <h2>We Provide <em>Different Services</em> &amp;
                <span>Features</span> For Your Agency
              </h2>
              <div class="line-dec"></div>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed doers eiusmod.</p>
            </div>
          </div>
          <div class="col-lg-6 col-sm-6">
            <div class="service-item">
              <div class="icon">
                <img src="assets/images/services-01.jpg" alt="discover SEO" class="templatemo-feature">
              </div>
              <h4>Discover More on Latest SEO Trends</h4>
            </div>
          </div>
          <div class="col-lg-6 col-sm-6">
            <div class="service-item">
              <div class="icon">
                <img src="assets/images/services-02.jpg" alt="data analysis" class="templatemo-feature">
              </div>
              <h4>Real-Time Big Data Analysis</h4>
            </div>
          </div>
          <div class="col-lg-6 col-sm-6">
            <div class="service-item">
              <div class="icon">
                <img src="assets/images/services-03.jpg" alt="precise data" class="templatemo-feature">
              </div>
              <h4>Precise Data Analysis &amp; Prediction</h4>
            </div>
          </div>
          <div class="col-lg-6 col-sm-6">
            <div class="service-item">
              <div class="icon">
                <img src="assets/images/services-04.jpg" alt="SEO marketing" class="templatemo-feature">
              </div>
              <h4>SEO Marketing &amp; Social Media</h4>
            </div>
          </div>
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

<div class="infos section" id="infos">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="main-content">
          <div class="row">
            <div class="col-lg-6">
              <div class="left-image">
                <img src="assets/images/left-infos.jpg" alt="">
              </div>
            </div>
            <div class="col-lg-6">
              <div class="section-heading">
                <h2>More <em>About Us</em> &amp; What <span>We Offer</span></h2>
                <div class="line-dec"></div>
                <p>You are free to use this template for any purpose. You are not allowed to redistribute the
                  downloadable ZIP file of Tale SEO Template on any other template website. Please contact us. Thank
                  you.</p>
              </div>
              <div class="skills">
                <div class="skill-slide marketing">
                  <div class="fill"></div>
                  <h6>Marketing</h6>
                  <span>90%</span>
                </div>
                <div class="skill-slide digital">
                  <div class="fill"></div>
                  <h6>Ditigal Media</h6>
                  <span>80%</span>
                </div>
                <div class="skill-slide media">
                  <div class="fill"></div>
                  <h6>Social Media Managing</h6>
                  <span>95%</span>
                </div>
              </div>
              <p class="more-info">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed doers eiusmod tempor
                incididunt ut labore et dolore dolor dolor sit amet, consectetur adipiscing elit, sed doers eiusmod.
              </p>
            </div>
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
                      <h4><a href="#">010-020-0340</a></h4>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="info-item">
                      <i class="fa fa-envelope"></i>
                      <h4><a href="#">info@company.com</a></h4>
                      <h4><a href="#">hello@company.com</a></h4>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="info-item">
                      <i class="fa fa-map-marker"></i>
                      <h4><a href="#">Sunny Isles Beach, FL 33160, United States</a></h4>
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