<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Syllabus extends Model
{
    //
    protected $table = "Syllabus";
    protected $fillable = ['idSyllabus','idUser','nameSyllabus', 'updated_at', 'created_at','intended','OutcomeBased','Teaching',];
}
