<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Step extends Model
{
    use HasFactory;
    
    protected $fillable=[
        'project_name',
        'name',
        'status',
    ];
    public function projects()
    {
        return $this->belongsToMany(Project::class,'project_step');
    }
}
