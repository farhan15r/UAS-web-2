<?php

namespace App\Controllers;

class Dashboard extends BaseController
{


    public function index()
    {
        $data = [
            'title' => 'Dashboard | RentCar',
        ];
        return view('dashboard/index', $data);
    }
}
