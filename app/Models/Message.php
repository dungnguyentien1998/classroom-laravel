<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'sender_id',
        'receiver_id',
        'message_content',
    ];

    public $timestamps = false;

    public function userSent(){
        return $this->belongsTo(User::class);
    }

//    public function userReceived(){
//        return $this->belongsTo('App\Models\User', 'users.id');
//    }
}
