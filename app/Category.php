<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $table = "categories";
    public function flower()
    {
        $this->hasMany(Flower::class);
    }
    public function getRouteKeyName()
    {
        return 'cate';
    }
    protected $fillable = [
        'cate',
    ];


}
