<?php

namespace App\Controllers;

use App\Models\CarsModel;
use App\Models\TypesModel;

class Cars extends BaseController
{
  public function __construct()
  {
    $this->carsModel = new CarsModel();
    $this->typesModel = new TypesModel();
  }

  public function list()
  {
    $cars = $this->carsModel->select('cars.*, types.name as type_name')->join('types', 'types.id = cars.type_id', 'left')->findAll();

    // change price
    foreach ($cars as $car => $value) {
      $cars[$car]['price'] = "Rp" . number_format($value['price'], 0, ',', '.');
    }

    $data = [
      'title' => 'Cars List | RentCar',
      'cars' => $cars,
    ];

    return view('dashboard/cars_list', $data);
  }

  public function add()
  {
    $types = $this->typesModel->findAll();

    $data = [
      'title' => 'Add Car | RentCar',
      'types' => $types
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
      'type' => 'required',
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
        'type_id' => $type,
        'brand' => $brand,
        'price' => $price,
        'license_plate' => $license_plate,
        'color' => $color
      ];

      $this->carsModel->insert($data);

      return redirect()->to('/dashboard/cars')->with('success', 'Add Car Success!');
    }
  }

  public function edit($id)
  {
    $types = $this->typesModel->findAll();
    $car = $this->carsModel->find($id);

    $data = [
      'title' => 'Edit Car | RentCar',
      'types' => $types,
      'car' => $car
    ];

    return view('dashboard/cars_edit', $data);
  }

  public function edit_save($id)
  {
    $original_data = $this->carsModel->find($id);

    $image = $this->request->getFile('image');
    $brand = $this->request->getVar('brand');
    $type = $this->request->getVar('type');
    $price = $this->request->getVar('price');
    $license_plate = $this->request->getVar('license_plate');
    $color = $this->request->getVar('color');

    $rules = [
      'image' => 'mime_in[image,image/jpg,image/jpeg,image/png]',
      'brand' => 'required',
      'type' => 'required',
      'license_plate' => 'required',
      'price' => 'required',
      'color' => 'required'
    ];

    if ($license_plate != $original_data['license_plate']) {
      $rules['license_plate'] = 'required|is_unique[cars.license_plate]';
    }

    if (!$this->validate($rules)) {
      return redirect()->back()->withInput()->with('validation', $this->validator->getErrors());
    } else {
      $data = [
        'type_id' => $type,
        'brand' => $brand,
        'price' => $price,
        'license_plate' => $license_plate,
        'color' => $color
      ];

      if ($image->getName() != '') {
        $image->move(ROOTPATH . 'public/assets/images/cars');

        unlink(ROOTPATH . 'public/assets/images/cars/' . $original_data['image']);

        $data = [
          'image' => $image->getName(),
        ];
      }

      $this->carsModel->update($id, $data);

      return redirect()->to('/dashboard/cars')->with('success', 'Edit Car Success!');
    }
  }

  public function delete($id)
  {
    $original_data = $this->carsModel->find($id);

    unlink(ROOTPATH . 'public/assets/images/cars/' . $original_data['image']);

    $this->carsModel->delete($id);

    return redirect()->to('/dashboard/cars')->with('success', 'Delete Car Success!');
  }
}
