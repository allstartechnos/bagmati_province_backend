<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Download extends BackendBaseModel
{
    protected $table = 'downloads';
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
        return $this->belongsTo(Download::class, 'parent_id');
    }

    public function subCategories()
    {
        return $this->hasMany(Download::class, 'parent_id');
    }

    public function posts()
    {
        return $this->hasMany(Download::class, 'parent_id', 'id');
    }
}
