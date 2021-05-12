<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    protected $fillable = [
        /* General questions */
        'job_number', 
        'modality',
        'job_type', 
        'g_01',
        'g_02',
        'g_03',
        'g_04',
        'g_05',
        'g_06',
        /* Wholesale CT questions */
        'w_ct_001',
        'w_ct_002',
        'w_ct_003',
        'w_ct_004',
        'w_ct_005',
        'w_ct_006',
        'w_ct_007',
        'w_ct_008',
        'w_ct_009',
        'w_ct_010',
        'w_ct_011',
        'w_ct_012'
    ];

}