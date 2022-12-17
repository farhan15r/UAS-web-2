<?php

namespace App\Controllers;

// model order
use App\Models\OrdersModel;

class Dashboard extends BaseController
{
    public function __construct()
    {
        // load model
        $this->ordersModel = new OrdersModel();
    }

    public function index()
    {
        // count all orders by type car
        $orders = $this->ordersModel->select('types.name AS type_name, COUNT(cars.type_id) as total')
            ->groupBy('cars.type_id')
            ->join('cars', 'cars.id = orders.car_id')
            ->join('types', 'types.id = cars.type_id')
            ->findAll();

        $data = [
            'title' => 'Dashboard | RentCar',
            'orders' => $orders
        ];
        return view('dashboard/index', $data);
    }
}
