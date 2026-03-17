<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Document extends BackendBaseModel
{
    use SoftDeletes;
    protected $table = 'documents';
    protected $fillable = [
        'type',
        'title',
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
}
