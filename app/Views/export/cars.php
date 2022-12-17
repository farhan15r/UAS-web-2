<style>
  table {
    border-collapse: collapse;
    width: 100%;
  }

  th {
    padding: 8px;
  }

  td {
    text-align: left;
    padding: 8px;
  }

  tr:nth-child(even) {
    background-color: #94d1ff;
  }
</style>

<div style="text-align: center;">
  <h2>Table of Cars</h2>
</div>

<table style="width:100%">
  <thead>
    <tr style="background-color: #58b5fc">
      <th width="5%">No</th>
      <th>Car Brand</th>
      <th>Car type</th>
      <th>Color</th>
      <th>License Plate</th>
    </tr>
  </thead>
  <tbody>
    <?php $num = 1 ?>
    <?php foreach ($cars as $car) : ?>
      <tr>
        <td><?= $num++; ?></td>
        <td><?= $car['brand']; ?></td>
        <td><?= $car['type_name']; ?></td>
        <td><?= $car['color']; ?></td>
        <td><?= $car['license_plate']; ?></td>
      <?php endforeach ?>
  </tbody>
</table>