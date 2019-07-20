<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suggests extends Model
{
    //
    protected $table = "suggests";
    //protected $primaryKey = ["idTemplate", "idLevel"];
    protected $fillable = ["idTemplate","idLevel","title","descriptionSuggest","example"];
    public $timestamps = false;
}
