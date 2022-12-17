<?= $this->extend('dashboard/layouts/main'); ?>

<?= $this->section('content'); ?>
<div class="row">
  <div class="col-12">
    <div class="card mb-4">
      <div class="card-header pb-0">
        <?php if (session()->getFlashdata('success')) : ?>
          <div class="alert alert-success text-white fw-bold" role="alert">
            <?= session()->getFlashdata('success') ?>
          </div>
        <?php endif ?>
        <div class="d-flex">
          <h6>Table of Orders</h6>
        </div>

      </div>
      <div class="card-body px-0 pt-0 pb-2">
        <div class="table-responsive p-0">
          <table class="table align-items-center mb-0">
            <thead>
              <tr>
                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7" style="width: 1%;">No.</th>
                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Brand of Car</th>
                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">License Plate</th>
                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Custumer Name</th>
                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Start Date</th>
                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">End Date</th>
                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Status</th>
                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1 ?>
              <?php foreach ($orders as $order) : ?>
                <tr>
                  <td class="px-4">
                    <p class="text-sm font-weight-bold mb-0"><?= $no++ ?></p>
                  </td>
                  <td class="px-4">
                    <p class="text-sm font-weight-bold mb-0"><?= $order['brand'] ?></p>
                  </td>
                  <td class="px-4">
                    <p class="text-sm font-weight-bold mb-0"><?= $order['license_plate'] ?></p>
                  </td>
                  <td class="px-4">
                    <p class="text-sm font-weight-bold mb-0"><?= $order['user_name'] ?></p>
                  </td>
                  <td class="px-4">
                    <p class="text-sm font-weight-bold mb-0"><?= $order['date_start'] ?></p>
                  </td>
                  <td class="px-4">
                    <p class="text-sm font-weight-bold mb-0"><?= $order['date_end'] ?></p>
                  </td>
                  <td class="px-4 align-middle text-sm">
                    <?php switch ($order['status']) {
                      case 'Waiting':
                        echo '<span class="badge badge-sm bg-gradient-secondary">Waiting</span>';
                        break;
                      case 'On Rent':
                        echo '<span class="badge badge-sm bg-gradient-warning">On Rent</span>';
                        break;
                      case 'Finished':
                        echo '<span class="badge badge-sm bg-gradient-success">Finished</span>';
                        break;
                      case 'Rejected':
                        echo '<span class="badge badge-sm bg-gradient-danger">Rejected</span>';
                        break;
                    } ?>
                  </td>
                  <td class="px-4 align-middle">
                    <?php if ($order['status'] == 'Waiting') : ?>
                      <a href="orders/reject/<?= $order['id'] ?>" class="badge badge-xs bg-gradient-danger text-xs">
                        <i class="fa fa-times text-xs text-white opacity-10"></i>
                      </a>
                      <a href="orders/accept/<?= $order['id'] ?>" class="badge badge-xs bg-gradient-success text-xs">
                        <i class="fa fa-check text-xs text-white opacity-10"></i>
                      </a>
                    <?php endif ?>
                    <?php if ($order['status'] == 'On Rent') : ?>
                      <a href="orders/return/<?= $order['id'] ?>" class="badge badge-xs bg-gradient-warning   text-xs">
                        <i class="fa fa-car text-xs text-white opacity-10"></i>
                      </a>
                    <?php endif ?>
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