<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Methods extends Model
{
    //
    protected $table = "methods";

    protected $fillable = ['idMethod','idTemplate','idLevel','nameMethod',];
}
