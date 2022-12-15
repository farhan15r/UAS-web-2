<?php

namespace App\Controllers;

use App\Models\TypesModel;
use App\Models\CarsModel;

class Types extends BaseController
{
  public function __construct()
  {
    $this->typesModel = new TypesModel();
    $this->carsModel = new CarsModel();
  }

  public function list()
  {
    $types = $this->typesModel->select('types.id, types.name, COUNT(cars.id) as total_cars')->join('cars', 'cars.type_id = types.id', 'left')->groupBy('types.id')->findAll();

    $data = [
      'title' => 'Types of Car List | RentCar',
      'types' => $types
    ];

    return view('dashboard/types_list', $data);
  }

  public function add()
  {
    $data = [
      'title' => 'Add New Type of Car | RentCar',
    ];

    return view('dashboard/types_add', $data);
  }

  public function add_insert()
  {


    $rules = [
      'name' => 'required|is_unique[types.name]',
    ];

    if (!$this->validate($rules)) {
      return redirect()->back()->withInput()->with('validation', $this->validator->getErrors());
    } else {
      $data = [
        'name' => $this->request->getVar('name'),
      ];

      $this->typesModel->save($data);

      return redirect()->to('/dashboard/types')->with('success', 'New type of car added successfully!');
    }
  }

  public function edit($id)
  {
    $type = $this->typesModel->find($id);

    $data = [
      'title' => 'Edit Type of Car | RentCar',
      'type' => $type
    ];

    return view('dashboard/types_edit', $data);
  }

  public function edit_save($id)
  {
    $rules = [
      'name' => 'required',
    ];

    if (!$this->validate($rules)) {
      return redirect()->back()->withInput()->with('validation', $this->validator->getErrors());
    } else {
      $data = [
        'name' => $this->request->getVar('name'),
      ];

      $this->typesModel->update($id, $data);

      return redirect()->to('/dashboard/types')->with('success', 'Type of car updated successfully!');
    }
  }

  public function delete($id)
  {
    $cars = $this->carsModel->where('type_id', $id)->first();

    if ($cars) {
      return redirect()->back()->with('error', 'Type of car cannot be deleted because it is still used in the car list!');
    }

    $this->typesModel->delete($id);

    return redirect()->to('/dashboard/types')->with('success', 'Type of car deleted successfully!');
  }
}
