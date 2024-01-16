<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Task;
use App\Models\User;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title'
    ];

    function tasks() {
        return $this->hasMany(Task::class);
    }

    function creator() {
        return $belongsTo(User::class, 'creator_id');
    }
}
