<?php

namespace App\Models;

use CodeIgniter\Model;

class CarsModel extends Model
{
  protected $table = 'cars';
  protected $allowedFields = ['brand', 'type', 'license_plate', 'color', 'price', 'image'];
}
