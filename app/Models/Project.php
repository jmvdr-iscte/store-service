<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class Project extends Model
{
    use HasFactory;

    protected $table = 'projects.projects';

    protected $fillable = [
        'uid', 'name', 'description', 'category', 'rating', 'status', 'user_id',
        'clicks', 'image', 'price', 'currency', 'status'
    ];


    protected static function booted()
    {
        static::creating(function ($project) {
            $project->uid = (string) Str::uuid();
            $project->status = 'PENDING';
        });
    }
}
