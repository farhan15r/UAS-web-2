<?php

namespace App\Controllers;

// model order
use App\Models\OrdersModel;
use App\Models\CarsModel;

class Dashboard extends BaseController
{
    private $ordersModel;
    private $carsModel;

    public function __construct()
    {
        // load model
        $this->ordersModel = new OrdersModel();
        $this->carsModel = new CarsModel();
    }

    public function index()
    {
        // count all orders by type car
        $orders = $this->ordersModel->select('types.name AS type_name, COUNT(cars.type_id) as total')
            ->groupBy('cars.type_id')
            ->join('cars', 'cars.id = orders.car_id')
            ->join('types', 'types.id = cars.type_id')
            ->findAll();

        $typeOfCars = $this->carsModel->select('types.name AS type_name, COUNT(cars.type_id) as total')->groupBy('cars.type_id')->join('types', 'types.id = cars.type_id')->findAll();

        // dd($typeOfCars);

        $data = [
            'title' => 'Dashboard | RentCar',
            'orders' => $orders,
            'typeOfCars' => $typeOfCars
        ];
        return view('dashboard/index', $data);
    }
}
