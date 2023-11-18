<?php

namespace App\Models\Company;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CMag extends Model
{
    use HasFactory;

    protected $connection = 'mysql2';

    protected $fillable = [
        'title',
        'slug',
        'categories',
        'tags',
        'content',
        'image',
        'alt_image',
        'status',
        'meta_title',
        'meta_keyword',
        'meta_description',
        'view',
    ];

    public function show()
    {
        $this->view++;
        return $this->save();
    }
}
