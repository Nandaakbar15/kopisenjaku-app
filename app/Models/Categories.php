<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable('name')]

class Categories extends Model
{
    use HasFactory;

    protected $table = 'tb_categories';
    protected $primaryKey = 'id';

    public function menu()
    {
        return $this->hasMany(Menu::class, 'category_id', 'id');
    }
}
