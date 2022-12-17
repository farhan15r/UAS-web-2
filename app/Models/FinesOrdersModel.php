<?php

namespace App\Models;

use CodeIgniter\Model;

class FinesOrdersModel extends Model
{
  protected $table = 'fines_orders';
  protected $allowedFields = ['order_id', 'fine_id', 'quantity', 'total'];
}
