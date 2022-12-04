<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>

<div class="container" style="margin-top: 150px;">
  <div class="row align-items-center">
    <div class="col-lg-7 align-self-center">
      <div class="card-register">
        <div class="get-free-quote">
          <form id="free-quote" method="POST" action="/login">
            <div class="row">
              <div class="col-lg-12">
                <div class="section-heading">
                  <h2><em>Login</em></h2>
                </div>
              </div>
              <?php $validation = session()->getFlashdata('validation') ?>
              <?php if (session()->getFlashdata('error')) : ?>
                <div class="alert alert-danger" role="alert"><?= session()->getFlashdata('error') ?></div>
              <?php endif  ?>
              <?php if (session()->getFlashdata('success')) : ?>
                <div class="alert alert-success" role="alert"><?= session()->getFlashdata('success') ?></div>
              <?php endif  ?>
              <div class="col-lg-12">
                <fieldset>
                  <small class="form-text text-danger"><?= $validation ? $validation->showError('username') : '' ?></small>
                  <input type="text" name="username" id="username" placeholder="Username" value="<?= old('username') ?>">
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <small class="form-text text-danger"><?= $validation ? $validation->showError('password') : '' ?></small>
                  <input type="password" name="password" id="password" placeholder="Password" value="<?= old('password') ?>">
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <button type="submit" id="form-submit" class="orange-button">Login</button>
                </fieldset>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="col-lg-5 header-text">
      <img src="assets/images/login.png" alt="">
    </div>
  </div>
</div>

<?= $this->endSection('content'); ?>