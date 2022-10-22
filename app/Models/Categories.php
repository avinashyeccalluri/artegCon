<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'category',
        'user_id',
        'project_id',
        'parent_id',
    ];

    public function getSubCategories(){
        return $this->hasMany('App\Models\SubCategories', 'category_id', 'id');
    }
    
    
    
}
