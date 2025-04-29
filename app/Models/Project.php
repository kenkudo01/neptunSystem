<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Project extends Model
{
    //
    use HasFactory;
    protected $fillable  = ["name", "description", "code", "credit", "user_id"];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
    public function students()
    {
        return $this->belongsToMany(User::class, 'project_user', 'project_id', 'user_id');
    }
    
    public function teacher() {
        return $this->belongsTo(User::class, 'user_id');
    }
    
}
