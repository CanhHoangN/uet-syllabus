<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Templates extends Model
{
    protected $table = "templates";
    protected $primaryKey = "idTemplate";
    protected $fillable = ['idTemplate','nameTemplate',];
}
