<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class catalogue extends Model
{
    protected $fillable = [
        'boutique_id',
        'evenement_id',
    ];
}
