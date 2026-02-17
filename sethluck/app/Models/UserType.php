<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserType extends Model
{

    use HasFactory;
    protected $table = 'usertypes';

    // Define the primary key if it differs from 'id'
    protected $primaryKey = 'usertype';

    // Disable incrementing if the primary key is not an auto-incrementing field
    public $incrementing = false;

    // Set the primary key type, since 'usertype' is an unsigned tinyint
    protected $keyType = 'int';

    // If timestamps are not used in this table, disable them
    public $timestamps = false;
}
