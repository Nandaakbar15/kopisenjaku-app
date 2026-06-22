<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable('title', 'image')]


class Galleries extends Model
{
    /** @use HasFactory<\Database\Factories\GalleriesFactory> */
    protected $table = 'tb_galleries';
    protected $primaryKey = 'id';


    use HasFactory;
}
