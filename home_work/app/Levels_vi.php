<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class levels_vi extends Model
{
    //
    protected $table = "levels_vi";
    protected $primaryKey = "idLevel";
    protected $fillable = ['idLevel','nameLevel','descriptionLevel',];
    public $timestamps = false;
}
