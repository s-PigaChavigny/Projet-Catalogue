<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class produit_catalogue extends Model
{
    protected $fillable = [
        'catalogue_id',
        'produit_id',
    ];
}
