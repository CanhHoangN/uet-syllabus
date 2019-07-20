<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class template_vi extends Model
{
    //
    protected $table = "templates_vi";
    protected $primaryKey = "idTemplate";
    protected $fillable = ['idTemplate','nameTemplate',];
}
