<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class boutique extends Model
{
    protected $fillable = [
        'name',
        'description',
        'contact_info',
        'image_path'
    ];
}
