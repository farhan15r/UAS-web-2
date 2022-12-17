<?php

namespace App\Models;

use CodeIgniter\Model;

class OrdersModel extends Model
{
  protected $table = 'orders';
  protected $allowedFields = ['user_id', 'car_id', 'date_start', 'date_end', 'subtotal', 'status', 'total_fine', 'total'];
}
