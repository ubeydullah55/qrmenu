<?php

namespace App\Models;

use CodeIgniter\Model;

class CallWaiterModel extends Model
{
    protected $table      = 'call_waiter';

    protected $allowedFields = ['id', 'table_no','time'];

   
}