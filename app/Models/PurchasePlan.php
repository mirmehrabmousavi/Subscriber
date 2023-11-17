<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchasePlan extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'plan_id'];

    public function plan()
    {
        return $this->belongsTo(Plan::class, 'plan_id');
    }
}
