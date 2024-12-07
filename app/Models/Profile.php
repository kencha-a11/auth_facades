<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'age',
        'bio',
        'image',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
