<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'points',
        'project_id',
    ];

 
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function solutions()
    {
        return $this->hasMany(Solution::class);
    }

}
