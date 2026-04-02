<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class About extends BackendBaseModel
{
    protected $table = 'abouts';
    protected $fillable = [
        'type',
        'title',
        'parent_id',
        'sub_title',
        'design',
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
        return $this->belongsTo(About::class, 'parent_id');
    }

    public function subCategories()
    {
        return $this->hasMany(About::class, 'parent_id');
    }

    public function posts()
    {
        return $this->hasMany(About::class, 'parent_id', 'id');
    }
}
