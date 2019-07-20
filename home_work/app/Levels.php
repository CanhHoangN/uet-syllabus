<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Levels extends Model
{
    //
    protected $table = "levels";
    protected $primaryKey = "idLevel";
    protected $fillable = ['idLevel','nameLevel','descriptionLevel',];
    public $timestamps = false;
    
}
