<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LabourFair extends Model
{
    use HasFactory;

    protected $fillable = [
        'sub_category_id',
        'project_id',
        'category_id',
        'fair',
        'work_duration',
        'no_of_labours',
        'sub_category',
        'user_id',
        'sub_category_name'
    ];
    
}
