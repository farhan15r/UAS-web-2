<?php

namespace App\Controllers;

use App\Models\OrdersModel;
use App\Models\FinesOrdersModel;
use App\Models\CarsModel;

//calling package pdf
use Dompdf\Dompdf;

// calling package excel
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Export extends BaseController
{
  public function __construct()
  {
    //load model
    $this->ordersModel = new OrdersModel();
    $this->finesOrdersModel = new FinesOrdersModel();
    $this->carsModel = new CarsModel();
  }

  function invoice($id)
  {
    //get data order
    $order = $this->ordersModel->select('orders.*, cars.license_plate, cars.brand, users.name AS username, users.address, users.no_tlp ')
      ->join('cars', 'cars.id = orders.car_id')
      ->join('users', 'users.id = orders.user_id')
      ->find($id);

    $order['days'] = (strtotime($order['date_end']) - strtotime($order['date_start'])) / (60 * 60 * 24);
    $order['subtotalRp'] = "Rp. " . number_format($order['subtotal'], 0, ',', '.');
    $price = $order['subtotal'] / $order['days'];
    $order['priceRp'] = "Rp. " . number_format($price, 0, ',', '.');
    $order['totalRp'] = "Rp. " . number_format($order['total'], 0, ',', '.');

    //get data fines
    $fines = $this->finesOrdersModel->select('fines_orders.*, fines.name, fines.price')
      ->join('fines', 'fines.id = fines_orders.fine_id')
      ->where('fines_orders.order_id', $id)
      ->findAll();

    foreach ($fines as $key => $fine) {
      if ($fine['quantity'] == 0) {
        unset($fines[$key]);
        continue;
      }
      $fines[$key]['price'] = $fine['total'] / $fine['quantity'];
      $fines[$key]['priceRp'] = "Rp. " . number_format($fine['price'], 0, ',', '.');
      $fines[$key]['totalRp'] = "Rp. " . number_format($fine['total'], 0, ',', '.');
    }

    // dd($order);

    $data = [
      'order' => $order,
      'fines' => $fines
    ];

    //load view
    $html = view('export/invoice', $data);
    //setting pdf
    $dompdf = new Dompdf();
    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'potrait');
    $dompdf->render();
    $dompdf->stream("invoice.pdf", array("Attachment" => false));
    exit(0);
  }

  public function excel_cars()
  {
    //get data cars
    $cars = $this->carsModel->select('cars.*, types.name AS type_name')
      ->join('types', 'types.id = cars.type_id')
      ->findAll();

    $fileName = 'cars_export.xlsx';

    //start package excel
    $spreadsheet = new Spreadsheet();

    //header
    $sheet = $spreadsheet->getActiveSheet();
    //(A1 : lokasi line & column excel, No : display data)
    $sheet->setCellValue('A1', 'No');
    $sheet->setCellValue('B1', 'License Plate');
    $sheet->setCellValue('C1', 'Brand');
    $sheet->setCellValue('D1', 'Type');
    $sheet->setCellValue('E1', 'Status');

    //data
    $column = 2;
    $no = 1;
    foreach ($cars as $car) {
      $sheet->setCellValue('A' . $column, $no++);
      $sheet->setCellValue('B' . $column, $car['license_plate']);
      $sheet->setCellValue('C' . $column, $car['brand']);
      $sheet->setCellValue('D' . $column, $car['type_name']);
      $sheet->setCellValue('E' . $column, $car['status']);
      $column++;
    }

    //export
    header("Content-Type: application/vnd.ms-excel");
    header('Content-Disposition: attachment; filename="' . urlencode($fileName) . '"');
    $writer = new Xlsx($spreadsheet);
    $writer->save('php://output');
  }

  public function pdf_cars()
  {
    //get data cars
    $cars = $this->carsModel->select('cars.*, types.name AS type_name')
      ->join('types', 'types.id = cars.type_id')
      ->findAll();

    $data = [
      'cars' => $cars
    ];

    //load view
    $html = view('export/cars', $data);
    //setting pdf
    $dompdf = new Dompdf();
    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'portrait');
    $dompdf->render();
    $dompdf->stream("cars.pdf", array("Attachment" => false));
    exit(0);
  }

  public function excel_orders()
  {
    //get data orders
    $orders = $this->ordersModel->select('orders.*, cars.license_plate, cars.brand, users.name AS username, users.address, users.no_tlp ')
      ->join('cars', 'cars.id = orders.car_id')
      ->join('users', 'users.id = orders.user_id')
      ->findAll();

    $fileName = 'orders_export.xlsx';

    //start package excel
    $spreadsheet = new Spreadsheet();

    //header
    $sheet = $spreadsheet->getActiveSheet();
    //(A1 : lokasi line & column excel, No : display data)
    $sheet->setCellValue('A1', 'No');
    $sheet->setCellValue('B1', 'License Plate');
    $sheet->setCellValue('C1', 'Brand');
    $sheet->setCellValue('D1', 'Customer Name');
    $sheet->setCellValue('E1', 'Address');
    $sheet->setCellValue('F1', 'No Tlp');
    $sheet->setCellValue('G1', 'Date Start');
    $sheet->setCellValue('H1', 'Date End');
    $sheet->setCellValue('I1', 'Subtotal');
    $sheet->setCellValue('J1', 'Fine Total');
    $sheet->setCellValue('K1', 'Total');

    //data
    $column = 2;
    $no = 1;
    foreach ($orders as $order) {
      $sheet->setCellValue('A' . $column, $no++);
      $sheet->setCellValue('B' . $column, $order['license_plate']);
      $sheet->setCellValue('C' . $column, $order['brand']);
      $sheet->setCellValue('D' . $column, $order['username']);
      $sheet->setCellValue('E' . $column, $order['address']);
      $sheet->setCellValue('F' . $column, $order['no_tlp']);
      $sheet->setCellValue('G' . $column, $order['date_start']);
      $sheet->setCellValue('H' . $column, $order['date_end']);
      $sheet->setCellValue('I' . $column, $order['subtotal']);
      $sheet->setCellValue('J' . $column, $order['total_fine']);
      $sheet->setCellValue('K' . $column, $order['total']);
      $column++;
    }

    //export
    header("Content-Type: application/vnd.ms-excel");
    header('Content-Disposition: attachment; filename="' . urlencode($fileName) . '"');
    $writer = new Xlsx($spreadsheet);
    $writer->save('php://output');
  }
}
