<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Police_rank extends Model
{
    protected $fillable = [

        'name'
    ];

    public function user()
    {
        return $this->hasMany(User::class);
    }
}
