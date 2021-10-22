<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $guarded=[];

    //pra permitir enviar ou manipular varios arrays na model
    protected $casts = [
        'name' =>'array',
    ];

    public function level()
    {
        return $this->belongsTo(Level::class);
    }
}
