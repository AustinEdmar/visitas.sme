<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','birthday','image','email','phone_number','police_rank_id',
        'level_id','direction_id','department_id','section_id','gender_id',
        'status_id','password','group_id','floor_id'
    ];

    public function level()
    {
        return $this->belongsTo(Level::class);
    }
    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }

    public function police_rank()
    {
        return $this->belongsTo(Police_rank::class);
    }

    public function direction()
    {
        return $this->belongsTo(Direction::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function manage_subject()
    {
        return $this->hasMany(Manage_subject::class);
    }

     public function group()
    {
        return $this->belongsTo(Group::class);
    }
     public function users()
    {
        return $this->belongsTo(Floor::class);
    }





    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
