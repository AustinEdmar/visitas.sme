<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nacionality extends Model
{
    protected $fillable = [

        'name'
    ];

    public function visitor()
    {
        return $this->hasMany(Visitor::class);
    }
}
