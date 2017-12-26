<?php

namespace App;

class Flower extends Model
{


    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function category()
    {
        $this->belongsTo(Category::class);
    }
}
