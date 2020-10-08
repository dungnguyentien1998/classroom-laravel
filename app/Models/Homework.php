<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Homework extends Model
{
    public $directory="./homeworks/";
    protected $table='files_homework';
//    public function getPathAttribute($value)
//    {
//        return $this->directory.$value;
//    }
    public $timestamps = false;
}
