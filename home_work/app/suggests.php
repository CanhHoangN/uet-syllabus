<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class suggests extends Model
{
    //
    protected $table = "suggests";
    protected $fillable = ["idTemplate","idLevel","title","descriptionSuggest","example"];
}
