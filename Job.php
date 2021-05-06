<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    protected $fillable = [
        'job_number', 
        'job_type', 
        'modality',
        'equipment_manufacturer',
        'equipment_model'
    ];

}