<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable('category_id', 'name', 'description', 'price', 'image', 'status')]


class Menu extends Model
{
    use HasFactory;

    protected $table = 'tb_menu';
    protected $primaryKey = 'id';

    public function categories()
    {
        return $this->belongsTo(Categories::class, 'category_id');
    }
}
