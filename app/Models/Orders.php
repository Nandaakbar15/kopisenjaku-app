<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable('customer_name', 'total_price', 'status')]

class Orders extends Model
{
    /** @use HasFactory<\Database\Factories\OrdersFactory> */
    protected $table = 'tb_orders';
    protected $primaryKey = 'id';

    public function order_details()
    {
        return $this->hasMany(OrderDetails::class, 'id');
    }

    use HasFactory;
}
