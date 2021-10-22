<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    protected $fillable = [

        'name'
    ];

    public function user()
    {

        return $this->hasMany(User::class);
    }

    public function permission()
    {
        return $this->hasOne(Permission::class);
    }
}
