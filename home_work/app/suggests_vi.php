<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class suggests_vi extends Model
{
    //
    protected $table = "suggests_vi";
    //protected $primaryKey = ["idTemplate", "idLevel"];
    protected $fillable = ["idTemplate","idLevel","title","descriptionSuggest","example"];
    public $timestamps = false;
}
