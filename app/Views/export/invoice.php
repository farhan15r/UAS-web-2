<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Invoice</title>

  <style type="text/css">
    * {
      font-family: Verdana, Arial, sans-serif;
    }

    table {
      font-size: x-small;
    }

    tfoot tr td {
      font-weight: bold;
      font-size: x-small;
    }

    .gray {
      background-color: lightgray
    }
  </style>

</head>

<body>
  <table width="100%">
    <tr>
      <td valign="top"></td>
      <td align="right">
        <h3>PT. Car Rental Abadi</h3>
        <pre>
                Reliable Car Rental Services
                Jl. Meruya Selatan Jakarta Barat
                +62 812 3456 7890
            </pre>
      </td>
    </tr>
  </table>


  <table width="100%">
    <tr>
      <td width="20%"><strong>Car Brand</strong></td>
      <td width="40%">: <?= $order['brand'] ?></td>
      <td width="20%"><strong>Date Start</strong></td>
      <td>: <?= $order['date_start'] ?></td>
    </tr>
    <tr>
      <td width="20%"><strong>Car License Plate</strong></td>
      <td width="40%">: <?= $order['license_plate'] ?></td>
      <td width="20%"><strong>Date End</strong></td>
      <td>: <?= $order['date_end'] ?></td>
    </tr>
    <tr>
      <td width="20%"><strong>Customer Name</strong></td>
      <td width="40%">: <?= $order['username'] ?></td>
      <td width="20%"><strong>Date Return</strong></td>
      <td>: <?= $order['date_return'] ?></td>
    </tr>
    <tr>
      <td width="20%"><strong>Customer Phone</strong></td>
      <td width="25%">: <?= $order['no_tlp'] ?></td>
    </tr>
    <tr>
      <td width="20%"><strong>Customer Address</strong></td>
      <td width="25%">: <?= $order['address'] ?></td>
    </tr>
  </table>

  <br />

  <table width="100%">
    <thead style="background-color: lightgray;">
      <tr>
        <th>No.</th>
        <th>Description</th>
        <th>Quantity or Day</th>
        <th>Unit Price (Rp)</th>
        <th>Total (Rp)</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row"><?= $no = 1 ?></th>
        <td>Rent Car <?= $order['brand'] ?></td>
        <td align="right"><?= $order['days'] ?></td>
        <td align="right"><?= $order['priceRp'] ?></td>
        <td align="right"><?= $order['subtotalRp'] ?></td>
      </tr>
      <?php foreach ($fines as $fine) : ?>
        <tr>
          <th scope="row"><?= ++$no ?></th>
          <td><?= $fine['name'] ?></td>
          <td align="right"><?= $fine['quantity'] ?></td>
          <td align="right"><?= $fine['priceRp'] ?></td>
          <td align="right"><?= $fine['totalRp'] ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>

    <tfoot>
      <tr>
        <td colspan="3"></td>
        <td align="right">Total </td>
        <td align="right" class="gray"><?= $order['totalRp'] ?></td>
      </tr>
    </tfoot>
  </table>

</body>

</html>