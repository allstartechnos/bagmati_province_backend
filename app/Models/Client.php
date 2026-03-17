<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends BackendBaseModel
{
    protected $table = 'clients';
    protected $fillable = [
        'type',
        'title',
        'sub_title',
        'rank',
        'slug',
        'url',
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
