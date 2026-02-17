<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    // Specify the table name if it's not the plural of the model name
    protected $table = 'patients';

    // Define the primary key if it’s not `id`
    protected $primaryKey = 'patientid';

    // Set incrementing to false since `patientid` is not an integer auto-increment
    public $incrementing = false;

    // Specify the primary key type
    protected $keyType = 'integer';

    // List of columns that are mass assignable
    protected $fillable = [
        'patientid',
        'username',
        'password',
        'fname',
        'lname',
        'street',
        'area',
        'province',
        'postalcode',
        'dob',
        'nicnumber',
        'gender',
        'emailaddress',
        'phonenumber',
        'summary',
    ];

    // If timestamps are used, Laravel will automatically handle `created_at` and `updated_at`
    public $timestamps = true;
}
