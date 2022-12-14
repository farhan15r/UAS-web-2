<?= $this->extend('dashboard/layouts/main'); ?>

<?= $this->section('content'); ?>
<div class="row">
  <div class="col-lg-8">
    <div class="card">
      <div class="card-header pb-0">
        <div class="d-flex align-items-center">
          <p class="mb-0">Add New Car</p>
        </div>
      </div>
      <div class="card-body">
        <form action="add" method="post">
          <?php $validation = session()->getFlashdata('validation') ?>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label class="form-control-label">Brand</label>
                <input class="form-control" name="name" type="text" placeholder="Sedan">
                <small class="form-text text-danger"><?= isset($validation['name']) ? $validation['name'] : '' ?></small>
              </div>
            </div>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>

<script>
  function preview() {
    frame.src = URL.createObjectURL(event.target.files[0]);
  }
</script>

<?= $this->endSection() ?>