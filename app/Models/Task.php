<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

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

}
