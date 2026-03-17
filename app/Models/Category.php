<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends BackendBaseModel
{
    protected $table = 'categories';
    protected $fillable = [
        'type',
        'title',
        'parent_id',
        'sub_title',
        'rank',
        'slug',
        'image',
        'banner',
        'description',
        'seo_title',
        'seo_keyword',
        'seo_description',
        'status',
        'created_by',
        'updated_by'
    ];

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function subCategories()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function pages()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }
}
