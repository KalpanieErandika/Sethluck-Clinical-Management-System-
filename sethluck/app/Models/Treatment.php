<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Treatment extends Model
{
    use HasFactory;

    // Specify the table name if it's not the plural of the model name
    protected $table = 'treatments';

    // Define the primary key if it’s not `id`
    protected $primaryKey = 'treatmentid';

    // Set incrementing to false since `patientid` is not an integer auto-increment
    public $incrementing = true;

    // Specify the primary key type
    protected $keyType = 'integer';

    // List of columns that are mass assignable
    protected $fillable = [
        'treatmentid',
        'patientid',
        'treatmentdate',
        'treatmenttype',
        'description'
    ];

    // If timestamps are used, Laravel will automatically handle `created_at` and `updated_at`
    public $timestamps = true;
}
