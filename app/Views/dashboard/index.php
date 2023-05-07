<?= $this->extend('dashboard/layouts/main'); ?>

<?= $this->section('content'); ?>
<div class="row mt-4">
  <div class="col-lg-8 mb-lg-0 mb-4">
    <div class="card z-index-2 h-100">
      <div class="card-header pb-0 pt-3 bg-transparent">
        <h6 class="text-capitalize">Type of Cars Most Populer</h6>
      </div>
      <div class="card-body p-3">
        <div class="chart">
          <canvas id="chart-line" class="chart-canvas" height="300"></canvas>
        </div>
      </div>
    </div>
  </div>

  <div class="col-lg-4 mb-lg-0 mb-4">
    <div class="card z-index-2 h-100">
      <div class="card-header pb-0 pt-3 bg-transparent">
        <h6 class="text-capitalize">Stock of Cars by Type</h6>
      </div>
      <div class="card-body p-3">
        <div class="chart">
          <canvas id="chart-doughnut" class="chart-canvas" height="300"></canvas>
        </div>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
  var ctx1 = document.getElementById("chart-line").getContext("2d");
  var ctx2 = document.getElementById("chart-doughnut").getContext("2d");

  var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

  gradientStroke1.addColorStop(1, 'rgba(94, 114, 228, 0.2)');
  gradientStroke1.addColorStop(0.2, 'rgba(94, 114, 228, 0.0)');
  gradientStroke1.addColorStop(0, 'rgba(94, 114, 228, 0)');
  new Chart(ctx1, {
    type: "line",
    data: {
      labels: [
        <?php foreach ($orders as $order) : ?> "<?= $order['type_name'] ?>",
        <?php endforeach; ?>
      ],
      datasets: [{
        label: "Total Orders",
        tension: 0.4,
        borderWidth: 0,
        pointRadius: 0,
        borderColor: "#5e72e4",
        backgroundColor: gradientStroke1,
        borderWidth: 3,
        fill: true,
        data: [
          <?php foreach ($orders as $order) : ?> "<?= $order['total'] ?>",
          <?php endforeach; ?>
        ],
        maxBarThickness: 6

      }],
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      plugins: {
        legend: {
          display: false,
        }
      },
      interaction: {
        intersect: false,
        mode: 'index',
      },
      scales: {
        y: {
          grid: {
            drawBorder: false,
            display: true,
            drawOnChartArea: true,
            drawTicks: false,
            borderDash: [5, 5]
          },
          ticks: {
            display: true,
            padding: 10,
            color: '#fbfbfb',
            font: {
              size: 11,
              family: "Open Sans",
              style: 'normal',
              lineHeight: 2
            },
          }
        },
        x: {
          grid: {
            drawBorder: false,
            display: false,
            drawOnChartArea: false,
            drawTicks: false,
            borderDash: [5, 5]
          },
          ticks: {
            display: true,
            color: '#ccc',
            padding: 20,
            font: {
              size: 11,
              family: "Open Sans",
              style: 'bold',
              lineHeight: 2
            },
          }
        },
      },
    },
  });

  new Chart(ctx2, {
    type: "doughnut",
    data: {
      labels: [
        <?php foreach ($typeOfCars as $typeOfCar) : ?> "<?= $order['type_name'] ?>",
        <?php endforeach; ?>
      ],
      datasets: [{
        label: "Mobile apps",
        tension: 0.4,
        borderWidth: 0,
        pointRadius: 0,
        borderColor: "#5e72e4",
        backgroundColor: [
          "#f3a4b5",
          "#5e72e4",
          "#2dce89",
          "#11cdef",
          "#fb6340",
        ],
        fill: true,
        data: [
          <?php foreach ($typeOfCars as $typeOfCar) : ?> "<?= $order['total'] ?>",
          <?php endforeach; ?>
        ],
        maxBarThickness: 6

      }],
    },
  })
</script>
<?= $this->endSection() ?>