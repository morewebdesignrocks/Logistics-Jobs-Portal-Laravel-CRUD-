<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    protected $fillable = [
        'job_number', 
        'modality',
        'job_type', 
        'equipment_manufacturer',
        'equipment_model',
        'gmid_company_we_buy_from',
        'gmid_company_we_sell_to',
        'equipment_requires_inspection',
        'gmid_company_inspecting_equipment'
    ];

}