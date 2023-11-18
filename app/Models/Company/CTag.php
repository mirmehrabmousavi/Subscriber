<?php

namespace App\Models\Company;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CTag extends Model
{
    use HasFactory;

    protected $connection = 'mysql2';

    protected $fillable = [
        'title',
        'slug',
        'image',
        'alt_image',
        'content',
        'status',
        'meta_title',
        'meta_keyword',
        'meta_desc',
        'view'
    ];

    public function show()
    {
        $this->view++;
        return $this->save();
    }
}
