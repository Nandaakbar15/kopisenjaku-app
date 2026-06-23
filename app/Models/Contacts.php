<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable('phone', 'email', 'address', 'maps_link')]

class Contacts extends Model
{
    /** @use HasFactory<\Database\Factories\ContactsFactory> */
    protected $table = 'tb_contacts';
    protected $primaryKey = 'id';

    use HasFactory;
}
