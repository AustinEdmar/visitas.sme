<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thing extends Model
{
    protected $fillable = [

        'name'
];


    public function manage_subject()
    {
        return $this->hasMany(Manage_subject::class);
    }
}
