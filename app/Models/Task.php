<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Project;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Auth;

class Task extends Model {

    use HasFactory;

    protected $casts = [
        'is_done' => 'boolean'
    ];

    protected $fillable = [
        'title', 'is_done'
    ];

    function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    function project() {
        return belongsTo(Project::class, 'project_id');
    }

    protected static function booted(): void {
        static::addGlobalScope('user', function(Builder $builder) {
            $builder->where('user_id', Auth::id());
        });
    }

}
