<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
  protected $table = 'users';
  protected $allowedFields = ['username', 'full_name', 'address', 'nik', 'no_tlp', 'password'];
}
