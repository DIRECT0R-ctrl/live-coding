<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

protected $fillable = ['title', 'is_done', 'user_id'];

class Task extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    }
