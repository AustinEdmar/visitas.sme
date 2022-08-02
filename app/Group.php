<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = ['name'];
    
    public function user()
    {
        return $this->hasMany(User::class);
    }

    public function direction()
    {
        return $this->hasMany(Direction::class);
    }

    public function department()
    {
        return $this->hasMany(Department::class);
    }

    public function section()
    {
        return $this->hasMany(Section::class);
    }



}
