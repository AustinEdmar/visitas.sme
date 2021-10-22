<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Floor extends Model
{
    public function direction()
    {
        return $this->hasOne(Direction::class);
    }

    public function department()
    {
        return $this->hasOne(Department::class);
    }

    public function section()
    {
        return $this->hasOne(Section::class);
    }

    public function manage_subjects()
    {
        return $this->hasMany(Manage_subject::class);
    }
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
