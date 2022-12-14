<?= $this->extend('dashboard/layouts/main'); ?>

<?= $this->section('content'); ?>
<div class="row">
  <div class="col-lg-8">
    <div class="card mb-4">
      <div class="card-header pb-0">
        <?php if (session()->getFlashdata('success')) : ?>
          <div class="alert alert-success text-white fw-bold" role="alert">
            <?= session()->getFlashdata('success') ?>
          </div>
        <?php endif ?>
        <div class="d-flex">
          <h6>Types of Cars</h6>
          <a class="ms-auto btn btn-primary" href="types/add">
            <i class="fa fa-plus text-white text-sm opacity-10 me-3"></i>
            Add New Type
          </a>
        </div>
      </div>
      <div class="card-body px-0 pt-0 pb-2">
        <div class="table-responsive p-0">
          <table class="table align-items-center mb-0">
            <thead>
              <tr>
                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7" style="width: 1%;">No.</th>
                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Type</th>
                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Quantity</th>
                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1 ?>
              <?php foreach ($types as $type) : ?>
                <tr>
                  <td class="px-4">
                    <p class="text-sm font-weight-bold mb-0"><?= $no++ ?></p>
                  </td>
                  <td class="px-4">
                    <p class="text-sm font-weight-bold mb-0"><?= $type['name'] ?></p>
                  </td>
                  <td class="px-4">
                    <p class="text-sm font-weight-bold mb-0">10</p>
                  </td>
                  <td class="px-4 align-middle">
                    <a href="types/<?= $type['id'] ?>" class="text-secondary font-weight-bold text-xs">
                      Edit
                    </a>
                  </td>
                </tr>
              <?php endforeach ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection() ?>