<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Direction extends Model
{
    protected $guarded = [

        /*  'name','extention',
        'floor_id',
        'group_id', */

    ];

    public function department()
    {
        return $this->hasMany(Department::class);
    }

  /*   public function manage_subject()
    {
        return $this->hasMany(Manage_subject::class);
    } */

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function floor()
    {
        return $this->belongsTo(Floor::class);
    }
    public function group()
    {
        return $this->hasOne(Group::class);
    }

    public function manage_subjects()
    {
        return $this->hasMany(Manage_subject::class);
    }
}
