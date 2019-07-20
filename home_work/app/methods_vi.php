<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class methods_vi extends Model
{
    //
    protected $table = "methods_vi";
    protected $primaryKey = "idMethod";
    protected $fillable = ['idMethod','idTemplate','idLevel','nameMethod',];
    public $timestamps = false;
}
