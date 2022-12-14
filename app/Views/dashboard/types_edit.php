<?= $this->extend('dashboard/layouts/main'); ?>

<?= $this->section('content'); ?>
<div class="row">
  <div class="col-lg-8">
    <div class="card">
      <div class="card-header pb-0">
        <?php if (session()->getFlashdata('error')) : ?>
          <div class="alert alert-danger text-white fw-bold" role="alert">
            <?= session()->getFlashdata('error') ?>
          </div>
        <?php endif ?>
        <div class="d-flex align-items-center">
          <p class="mb-0">Add New Car</p>
        </div>
      </div>
      <div class="card-body">
        <form action="<?= $type['id'] ?>" method="post">
          <?php $validation = session()->getFlashdata('validation') ?>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label class="form-control-label">Brand</label>
                <input class="form-control" name="name" type="text" placeholder="Sedan" value="<?= $type['name'] ?>">
                <small class="form-text text-danger"><?= isset($validation['name']) ? $validation['name'] : '' ?></small>
              </div>
            </div>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
          <a href="delete/<?= $type['id'] ?>" class="btn btn-outline-danger" onclick="confirm('Are you sure to delete this data?')">
            <i class="fa fa-trash-o text-danger fw-bold"></i>
          </a>
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