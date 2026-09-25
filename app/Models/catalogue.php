<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class catalogue extends Model
{
    public function boutique()
    {
        return $this->belongsTo(boutique::class);
    }

    public function evenement()
    {
        return $this->belongsTo(Evenement::class);
    }

    protected $fillable = [
        'boutique_id',
        'evenement_id',
    ];
}
