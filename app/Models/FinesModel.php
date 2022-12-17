<?php

namespace App\Models;

use CodeIgniter\Model;

class FinesModel extends Model
{
  protected $table = 'fines';
  protected $allowedFields = ['name', 'price'];
}
