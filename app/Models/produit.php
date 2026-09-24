<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class produit extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
        'boutique_id',
        'image_path'
    ];
}
