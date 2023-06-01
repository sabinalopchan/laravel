<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Auth;
use Illuminate\Support\Str;
use Illuminate\Notifications\Notifiable;

class User extends Auth
{
    use HasFactory, Notifiable;
    protected $fillable=[
        'name',
        'username',
        'email',
        'password',
        'gender',
        'image',
        'usertype',
        'status'
        ];
    public function getNameAttribute($value){
        return Str::title($value);
    }
}
