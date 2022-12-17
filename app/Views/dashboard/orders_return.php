<?= $this->extend('dashboard/layouts/main'); ?>

<?= $this->section('content'); ?>
<div class="row">
  <div class="col-lg-8">
    <div class="card">
      <div class="card-header pb-0">
        <div class="d-flex align-items-center">
          <p class="mb-0">Returning Car</p>
        </div>
      </div>
      <div class="card-body">
        <form action="<?= $order['id'] ?>" method="post" enctype="multipart/form-data">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label class="form-control-label">Customer Name</label>
                <input class="form-control" type="text" value="<?= $order['username'] ?>" disabled>
                <small class="form-text text-danger"></small>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label class="form-control-label">Car Brand</label>
                <input class="form-control" type="text" value="<?= $order['brand'] ?>" disabled>
                <small class="form-text text-danger"></small>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label class="form-control-label">License Plate</label>
                <input class="form-control" type="text" value="<?= $order['license_plate'] ?>" disabled>
                <small class="form-text text-danger"></small>
              </div>
            </div>
            <?php foreach ($fines as $fine) : ?>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="form-control-label"><?= $fine['name'] ?> @<?= $fine['price'] ?></label>
                  <input class="form-control" name="<?= $fine['id'] ?>" type="number" value="0">
                  <small class="form-text text-danger"></small>
                </div>
              </div>
            <?php endforeach ?>
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

</script>

<?= $this->endSection() ?>