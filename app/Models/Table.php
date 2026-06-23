<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable('table_number', 'capacity', 'status')]

class Table extends Model
{
    /** @use HasFactory<\Database\Factories\TableFactory> */
    protected $table = 'tb_tables';
    protected $primaryKey = 'id';

    public function reservations()
    {
        return $this->hasMany(Reservations::class, 'id');
    }

    use HasFactory;
}
