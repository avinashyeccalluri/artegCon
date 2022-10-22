<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectName extends Model
{

    protected $fillable = [
        'project_name',
        'location',
        'user_id'
    ];
    
    
    use HasFactory;
}
