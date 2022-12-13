<?php

namespace App\Controllers;

use App\Models\CarsModel;

class Cars extends BaseController
{
  public function __construct()
  {
    $this->carsModel = new CarsModel();
  }

  public function list()
  {
    $cars = $this->carsModel->findAll();

    // change price
    foreach ($cars as $car => $value) {
      $cars[$car]['price'] = "Rp" . number_format($value['price'], 0, ',', '.');
    }

    $data = [
      'title' => 'Cars List | RentCar',
      'cars' => $cars
    ];

    return view('dashboard/cars_list', $data);
  }

  public function add()
  {
    $data = [
      'title' => 'Add Car | RentCar',
    ];

    return view('dashboard/cars_add', $data);
  }

  public function add_insert()
  {
    $image = $this->request->getFile('image');
    $brand = $this->request->getVar('brand');
    $type = $this->request->getVar('type');
    $price = $this->request->getVar('price');
    $license_plate = $this->request->getVar('license_plate');
    $color = $this->request->getVar('color');

    $rules = [
      'image' => 'uploaded[image]|mime_in[image,image/jpg,image/jpeg,image/png]',
      'brand' => 'required',
      'price' => 'required',
      'license_plate' => 'required|is_unique[cars.license_plate]',
      'color' => 'required'
    ];

    if (!$this->validate($rules)) {
      return redirect()->back()->withInput()->with('validation', $this->validator->getErrors());
    } else {
      $image->move(ROOTPATH . 'public/assets/images/cars');

      $data = [
        'image' => $image->getName(),
        'brand' => $brand,
        'price' => $price,
        'license_plate' => $license_plate,
        'color' => $color
      ];

      $this->carsModel->insert($data);

      session()->setFlashdata('success', 'Add Car Success');
      return redirect()->to('/dashboard/cars')->with('success', 'Add Car Success!');
    }
  }
}
