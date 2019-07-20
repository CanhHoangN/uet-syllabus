<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Methods extends Model
{
    protected $table = "methods";
    protected $primaryKey = "idMethod";
    protected $fillable = ['idMethod','idTemplate','idLevel','nameMethod',];
    public $timestamps = false;
    
}
