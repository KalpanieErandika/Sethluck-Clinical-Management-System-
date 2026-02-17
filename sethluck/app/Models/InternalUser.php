<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;


class InternalUser extends Authenticatable
{
    use HasApiTokens;
    protected $table = 'internalusers';

    protected $primaryKey = 'username'; // If `username` is the primary key
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['username', 'password', 'fname', 'lname', 'usertype'];

    protected $hidden = ['created_at', 'updated_at'];

    // To handle password hashing

}

