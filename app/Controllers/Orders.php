<?php

namespace App\Controllers;

use App\Models\OrdersModel;
use App\Models\CarsModel;
use App\Models\FinesModel;
use App\Models\FinesOrdersModel;

class Orders extends BaseController
{
  public function __construct()
  {
    $this->ordersModel = new OrdersModel();
    $this->carsModel = new CarsModel();
    $this->finesModel = new FinesModel();
    $this->finesOrdersModel = new FinesOrdersModel();
  }

  public function list()
  {
    $orders = $this->ordersModel->select('orders.*, cars.license_plate, cars.brand, cars.image, cars.price, users.name as user_name')
      ->join('cars', 'cars.id = orders.car_id')
      ->join('users', 'users.id = orders.user_id')
      ->orderBy('orders.id', 'DESC')
      ->findAll();

    $data = [
      'title' => 'Orders | RentCar',
      'orders' => $orders
    ];
    return view('dashboard/orders_list', $data);
  }

  public function reject($id)
  {
    $data = [
      'status' => 'Rejected'
    ];

    $this->ordersModel->update($id, $data);

    session()->setFlashdata('success', 'Order Rejected');
    return redirect()->back();
  }

  public function accept($id)
  {
    $order = $this->ordersModel->select('car_id')->find($id);
    $carId = $order['car_id'];

    $db = \Config\Database::connect();
    $db->transStart();

    $data = [
      'status' => 'On Rent'
    ];

    $this->ordersModel->update($id, $data);

    $data = [
      'status' => 'Rejected'
    ];

    $this->ordersModel->where('id !=', $id)->where('car_id', $carId)->where('status', 'waiting')->set($data)->update();

    // set status car to on rent
    $data = [
      'status' => 'On Rent'
    ];

    $this->carsModel->update($carId, $data);

    $db->transComplete();

    session()->setFlashdata('success', 'Order Accepted');
    return redirect()->back();
  }

  public function return($id)
  {
    $order = $this->ordersModel->select('orders.*, users.name AS username, cars.brand, cars.license_plate')
      ->join('users', 'users.id = orders.user_id')
      ->join('cars', 'cars.id = orders.car_id')
      ->find($id);
    $fines = $this->finesModel->where('name !=', 'Late')->findAll();

    $data = [
      'title' => 'Return Car | RentCar',
      'order' => $order,
      'fines' => $fines
    ];

    return view('dashboard/orders_return', $data);
  }

  public function return_post($id)
  {
    $order = $this->ordersModel->find($id);
    $fines = $this->finesModel->findAll();

    $bodyRisk = $this->request->getPost('1');
    $engineRisk = $this->request->getPost('2');

    $TotalFine = 0;

    $bodyRiskPrice = $fines[0]['price']; // id 1
    $engineRiskPrice = $fines[1]['price']; // id 2
    $lateProce = $fines[2]['price']; // id 3

    $dateNow = date('Y-m-d');
    $dateEnd = $order['date_end'];

    $dateNow = strtotime($dateNow);
    $dateEnd = strtotime($dateEnd);

    if ($dateNow > $dateEnd) {
      $late = $dateNow - $dateEnd;
      $late = floor($late / (60 * 60 * 24));
    } else {
      $late = 0;
    }

    // body risk
    $data = [
      'order_id' => $id,
      'fine_id' => 1,
      'quantity' => $bodyRisk,
      'total' => $bodyRisk * $bodyRiskPrice
    ];
    $TotalFine += $bodyRisk * $bodyRiskPrice;
    $this->finesOrdersModel->insert($data);

    // engine risk
    $data = [
      'order_id' => $id,
      'fine_id' => 2,
      'quantity' => $engineRisk,
      'total' => $engineRisk * $engineRiskPrice
    ];
    $TotalFine += $engineRisk * $engineRiskPrice;
    $this->finesOrdersModel->insert($data);

    // late
    $data = [
      'order_id' => $id,
      'fine_id' => 3,
      'quantity' => $late,
      'total' => $late * $lateProce
    ];
    $TotalFine += $late * $lateProce;
    $this->finesOrdersModel->insert($data);

    // set status car to available
    $carId = $order['car_id'];

    $data = [
      'status' => 'Available'
    ];

    $this->carsModel->update($carId, $data);

    // set status order to finished
    $subtotal = $order['subtotal'];
    $total = $subtotal + $TotalFine;

    $data = [
      'total_fine' => $TotalFine,
      'total' => $total,
      'status' => 'Finished'
    ];

    $this->ordersModel->update($id, $data);



    session()->setFlashdata('success', 'Order Finished');
    return redirect()->to('/dashboard/orders');
  }
}
