<?php

namespace App\Controllers;

use App\Models\CarsModel;
use App\Models\OrdersModel;

class Order extends BaseController
{
  public function __construct()
  {
    $this->carsModel = new CarsModel();
    $this->ordersModel = new OrdersModel();
  }

  public function index($id)
  {
    $car = $this->carsModel->find($id);

    $car['price_rupiah'] = "Rp" . number_format($car['price'], 0, ',', '.');

    $data = [
      'title' => 'Order | RentCar',
      'car' => $car
    ];
    return view('order', $data);
  }

  public function order_insert($id)
  {
    $car = $this->carsModel->find($id);
    $user_id = session()->get('id');

    $price = $car['price'];

    $date_start = $this->request->getVar('date_start');
    $date_end = $this->request->getVar('date_end');

    $date1 = strtotime($date_start);
    $date2 = strtotime($date_end);

    $diff = abs($date2 - $date1);

    $years = floor($diff / (365 * 60 * 60 * 24));
    $months = floor(($diff - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
    $days = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));

    $subtotal = $days * $price;

    $data = [
      'user_id' => $user_id,
      'car_id' => $id,
      'date_start' => $date_start,
      'date_end' => $date_end,
      'subtotal' => $subtotal,
      'status' => 'Waiting'
    ];

    $this->ordersModel->insert($data);

    session()->setFlashdata('success', 'Order Success');
    return redirect()->to('/')->with('success', 'Order Success, Please Wait for Confirmation!');
  }
}
