<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends BackendBaseModel
{
    protected $table = 'settings';
    protected $fillable = [
        'logo',
        'fav_icon',
        'slogan',
        'email',
        'phone',
        'phone_two',
        'mobile',
        'licence',
        'address',
        'facebook',
        'twitter',
        'youtube',
        'linkedin',
        'instagram',
        'viber',
        'whatsapp',
        'google_map',
        'created_by',
        'updated_by'
    ];
}
