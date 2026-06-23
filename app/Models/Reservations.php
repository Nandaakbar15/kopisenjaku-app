<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable('customer_name', 'phone', 'reservation_date', 'guest_count', 'table_id', 'status')]

class Reservations extends Model
{
    /** @use HasFactory<\Database\Factories\ReservationsFactory> */
    protected $table = 'tb_reservations';
    protected $primaryKey = 'id';

    public function tables()
    {
        return $this->belongsTo(Table::class, 'table_id');
    }

    use HasFactory;
}
