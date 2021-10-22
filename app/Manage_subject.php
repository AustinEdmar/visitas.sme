<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manage_subject extends Model
{
    protected $fillable = [

        'pvc_number', 'object_left', 'exit_time', 'motive','user_id','department_id',
        'pvc_id', 'visitor_id', 'direction_id', 'document_id','progress_id','by'
    ];

    public function pvc()
    {
        return $this->belongsTo(Pvc::class);
    }

    public function document()
    {
        return $this->belongsTo(Document::class);
    }

    public function progress()
    {
        return $this->belongsTo(Progress::class);
    }

    public function visitor()
    {
        return $this->belongsTo(Visitor::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }




    protected $casts = [
        'created_at' => 'datetime:Y-m-d',
        'updated_at' => 'datetime:Y-m-d',
        'deleted_at' => 'datetime:Y-m-d h:i:s'
     ];
}
