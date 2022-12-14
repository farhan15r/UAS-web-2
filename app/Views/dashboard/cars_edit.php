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
        <form action="<?= $car['id'] ?>" method="post" enctype="multipart/form-data">
          <?php $validation = session()->getFlashdata('validation') ?>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label class="form-control-label">Brand</label>
                <input class="form-control" name="brand" type="text" placeholder="Avanza or X-Pander" value="<?= old('brand', $car['brand']) ?>">
                <small class="form-text text-danger"><?= isset($validation['brand']) ? $validation['brand'] : '' ?></small>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label class="form-control-label">Type</label>
                <select class="form-select" name="type">
                  <option selected disabled>Select Type</option>
                  <?php foreach ($types as $type) : ?>
                    <option value="<?= $type['id'] ?>" <?= old('type', $car['type_id']) == $type['id'] ? 'selected' : '' ?>><?= $type['name'] ?></option>
                  <?php endforeach ?>
                </select>
                <small class="form-text text-danger"><?= isset($validation['type']) ? $validation['type'] : '' ?></small>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label class="form-control-label">License Plate</label>
                <input class="form-control" name="license_plate" type="text" placeholder="B 123 ABC" value="<?= old('license_plate', $car['license_plate']) ?>">
                <small class="form-text text-danger"><?= isset($validation['license_plate']) ? $validation['license_plate'] : '' ?></small>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label class="form-control-label">Color</label>
                <input class="form-control" name="color" type="text" placeholder="Blue" value="<?= old('color', $car['color']) ?>">
                <small class="form-text text-danger"><?= isset($validation['color']) ? $validation['color'] : '' ?></small>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label class="form-control-label">Price</label>
                <input class="form-control" name="price" type="number" placeholder="1000000" value="<?= old('price', $car['price']) ?>">
                <small class="form-text text-danger"><?= isset($validation['price']) ? $validation['price'] : '' ?></small>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label class="form-control-label">Image</label>
                <input class="form-control" name="image" type="file" accept="image/png, image/gif, image/jpeg" onchange="preview()">
                <small class="form-text text-danger"><?= isset($validation['image']) ? $validation['image'] : '' ?></small>
                <img id="frame" src="/assets/images/cars/<?= $car['image'] ?>" class="col-md-6 img-fluid d-flex my-4" />
              </div>
            </div>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
          <a href="delete/<?= $car['id'] ?>" class="btn btn-outline-danger" onclick="confirm('Are you sure to delete this data?')">
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