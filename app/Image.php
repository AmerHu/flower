<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    public function flowers()
    {
        $this->belongsTo(Flower::class);
    }
    protected $fillable = [
       'images','flower_id'
    ];
}
