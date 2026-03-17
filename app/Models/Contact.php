<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'contacts';
    protected $fillable = [
        'type',
        'name',
        'title',
        'sub_title',
        'image',
        'banner',
        'email',
        'phone',
        'address',
        'message'
    ];
}
