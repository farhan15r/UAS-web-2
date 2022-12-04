<?php

namespace App\Controllers;

use App\Models\CarsModel;

class Home extends BaseController
{
    public function __construct()
    {
        $this->carsModel = new CarsModel();
    }

    public function index()
    {
        $cars = $this->carsModel->findAll();

        // change price
        foreach ($cars as $car => $value) {
            $cars[$car]['price'] = "Rp" . number_format($value['price'], 0, ',', '.');
        }

        $data = [
            'title' => 'Home | RentCar',
            'cars' => $cars
        ];

        return view('index', $data);
    }

    public function cars()
    {
        $cars = $this->carsModel->findAll();

        // change price
        foreach ($cars as $car => $value) {
            $cars[$car]['price'] = "Rp" . number_format($value['price'], 0, ',', '.');
        }

        $data = [
            'title' => 'All Cars | Rent',
            'cars' => $cars
        ];

        return view('cars', $data);
    }
}
