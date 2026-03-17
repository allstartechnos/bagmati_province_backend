<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends BackendBaseModel
{
    protected $table = 'sliders';
    protected $fillable = [
        'type',
        'title',
        'sub_title',
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
}
