<?php

namespace App\Models;

use CodeIgniter\Model;

class TypesModel extends Model
{
  protected $table = 'types';
  protected $allowedFields = ['name'];
}
