<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    public $directory="./submissions/";
    protected $table='files_submission';
//    public function getPathAttribute($value)
//    {
//        return $this->directory.$value;
//    }
    public $timestamps = false;
}
