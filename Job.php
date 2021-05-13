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
        'r_ct_001',
        'r_ct_002',
        'r_ct_003',
        'r_ct_005',
        'r_ct_006',
        'r_ct_007',
        'r_ct_008',
        'r_ct_009',
        'r_ct_010',
        'r_ct_011',
        'r_ct_012',
        /* Inventory CT questions */
        'i_ct_001',
        'i_ct_002',
        'i_ct_003',
        'i_ct_004',
        'i_ct_005',
        'i_ct_006',
        'i_ct_007',
        /* Mix CT questions */
        'rw_ct_001',
        'ri_ct_002'
    ];

}