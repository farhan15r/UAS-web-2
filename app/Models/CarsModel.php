<?php

namespace App\Models;

use CodeIgniter\Model;

class CarsModel extends Model
{
  protected $table = 'cars';
  protected $allowedFields = ['name', 'price', 'image'];
}
