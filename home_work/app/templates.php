<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class templates extends Model
{
    protected $table = "templates";

    protected $fillable = ['idTemplate','nameTemplate',];
}
