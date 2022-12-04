<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>

<div class="container" style="margin-top: 150px;">
  <div class="row align-items-center">
    <div class="col-lg-7 align-self-center">
      <div class="card-register">
        <div class="get-free-quote">
          <form id="free-quote" method="POST" action="/register">
            <div class="row">
              <div class="col-lg-12">
                <div class="section-heading">
                  <h2><em>Register</em> Now</h2>
                </div>
              </div>
              <?php $validation = session()->getFlashdata('validation') ?>
              <div class="col-lg-12">
                <fieldset>
                  <small class="form-text text-danger"><?= $validation ? $validation->showError('name') : '' ?></small>
                  <input type="text" name="name" id="name" placeholder="Your Full Name" value="<?= old('name') ?>">
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <small class="form-text text-danger"><?= $validation ? $validation->showError('nik') : '' ?></small>
                  <input type="text" name="nik" id="nik" placeholder="Your NIK" value="<?= old('nik') ?>">
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <small class="form-text text-danger"><?= $validation ? $validation->showError('username') : '' ?></small>
                  <input type="text" name="username" id="username" placeholder="Username" required value="<?= old('username') ?>">
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <small class="form-text text-danger"><?= $validation ? $validation->showError('password') : '' ?></small>
                  <input type="password" name="password" id="password" placeholder="New Password" required>
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <small class="form-text text-danger"><?= $validation ? 'The password does not match' : '' ?></small>
                  <input type="password" name="password_confirmation" id="password" placeholder="Retype Password" required>
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <input type="phone-number" name="no_tlp" id="phone-number" placeholder="Phone Number" autocomplete="on" required value="<?= old('no_tlp') ?>">
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <small class="form-text text-danger"><?= $validation ? $validation->showError('address') : '' ?></small>
                  <textarea class="text-register" name="address" id="address" placeholder="Your Address"><?= old('address') ?></textarea>
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <button type="submit" id="form-submit" class="orange-button">Register</button>
                </fieldset>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="col-lg-5 header-text">
      <img src="assets/images/register.png" alt="">
    </div>
  </div>
</div>

<?= $this->endSection('content'); ?>