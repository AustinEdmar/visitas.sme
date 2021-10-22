<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $guarded = [];

    /* protected $fillable = [

        'document','image_document','number_document','date_emission'
    ]; */

    public function visitor()
    {
        return $this->hasMany(Visitor::class);
    }
}
