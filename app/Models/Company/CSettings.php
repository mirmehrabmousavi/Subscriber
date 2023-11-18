<?php

namespace App\Models\Company;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CSettings extends Model
{
    use HasFactory;

    protected $connection = 'mysql2';

    protected $fillable = [
        'key',
        'value',
        'site_id',
    ];
}
