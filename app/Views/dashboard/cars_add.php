<?= $this->extend('dashboard/layouts/main'); ?>

<?= $this->section('content'); ?>
<div class="row">
  <div class="col-md-8">
    <div class="card">
      <div class="card-header pb-0">
        <div class="d-flex align-items-center">
          <p class="mb-0">Add New Car</p>
        </div>
      </div>
      <div class="card-body">
        <form action="add" method="post" enctype="multipart/form-data">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label class="form-control-label">Brand</label>
                <input class="form-control" name="brand" type="text" placeholder="Avanza or X-Pander" required>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label class="form-control-label">Type</label>
                <select class="form-select" name="price" id="price">
                  <option value="1">SUV</option>
                  <option value="2">MPV</option>
                  <option value="3">Sedan</option>
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label class="form-control-label">License Plate</label>
                <input class="form-control" name="license_plate" type="text" placeholder="B 123 ABC" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label class="form-control-label">Color</label>
                <input class="form-control" name="color" type="text" placeholder="Blue" required>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label class="form-control-label">Price</label>
                <input class="form-control" name="price" type="number" placeholder="1000000" required>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label class="form-control-label">Image</label>
                <input class="form-control" name="image" type="file" accept="image/png, image/gif, image/jpeg" required>
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