<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Plan extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'price'];

    public function isPurchased()
    {
        return PurchasePlan::where('user_id', Auth::id())->where('plan_id', $this->id)->exists();
    }
}
