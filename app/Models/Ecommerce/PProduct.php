<?php

namespace App\Models\Ecommerce;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PProduct extends Model
{
    use HasFactory;
    protected $connection = 'mysql3';

    protected $fillable = ['title'];
}
