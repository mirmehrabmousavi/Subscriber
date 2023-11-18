<?php

namespace App\Models\Company;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CCategory extends Model
{
    use HasFactory;

    protected $connection = 'mysql2';

    protected $fillable = [
        'title',
        'slug',
        'parent_id',
        'sort',
        'image',
        'alt_image',
        'content',
        'status',
        'meta_title',
        'meta_keyword',
        'meta_description',
        'view',
        'site_id',
    ];

    public function show()
    {
        $this->view++;
        return $this->save();
    }

    public function categories()
    {
        return $this->hasMany(CCategory::class, 'parent_id', 'id')->orderBy('sort', 'ASC');
    }

    public function category()
    {
        return $this->morphedByMany(CCategory::class, 'catables');
    }
}
