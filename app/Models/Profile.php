<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = 'profiles';
    protected $fillable = [
        'user_id', 
        'image',
        'phone',
        'website',
        'address',
        'github',
        'facebook',
        'twitter',
        'youtube',
        'linkedin',
        'instagram',
        'viber',
        'whatsapp',
        'created_by',
        'updated_by',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
