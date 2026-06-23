<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable('order_id', 'menu_id', 'quantity', 'price')]

class OrderDetails extends Model
{
    /** @use HasFactory<\Database\Factories\OrderDetailsFactory> */
    protected $table = 'tb_order_details';
    protected $primaryKey = 'id';

    public function orders()
    {
        return $this->belongsTo(Orders::class, 'order_id');
    }

    public function menu()
    {
        return $this->belongsTo(Menu::class, 'menu_id');
    }

    use HasFactory;
}
