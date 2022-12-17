<?php

namespace App\Models;

use CodeIgniter\Model;

class CarsModel extends Model
{
  protected $table = 'cars';
  protected $allowedFields = ['brand', 'type_id', 'license_plate', 'color', 'price', 'image', 'status'];
}
