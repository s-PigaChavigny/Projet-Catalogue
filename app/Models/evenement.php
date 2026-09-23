<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evenement extends Model
{
    protected $fillable = [
        'name',
        'description',
        'date',
        'lieu',
        'image_path',
        'lien_web',
    ];
}
