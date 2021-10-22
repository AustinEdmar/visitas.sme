<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    protected $fillable = [ 'name'];

    public $timestamps = false;

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function visitor()
    {
        return $this->hasMany(Visitor::class);
    }
}
