<?php

namespace App\Controllers;

use App\Models\CarsModel;

class Order extends BaseController
{
  public function __construct()
  {
    $this->carsModel = new CarsModel();
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
}
