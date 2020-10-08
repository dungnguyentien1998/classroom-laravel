<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Challenge extends Model
{
    public $directory="./challenges/";
    protected $table='challenges';
//    public function getPathAttribute($value)
//    {
//        return $this->directory.$value;
//    }
    public $timestamps = false;
}
