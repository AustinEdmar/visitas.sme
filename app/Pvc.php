<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pvc extends Model
{

    protected $fillable = [

        'number_pvc'
    ];

    public function manage_subject()
    {
        return $this->hasMany(Manage_subject::class);
    }
}
