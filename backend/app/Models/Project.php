<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'role',
        'summary',
        'description',
        'cover_image',
        'gallery',
        'tools',
        'project_url',
        'repo_url',
        'featured',
        'order',
    ];

    protected $casts = [
        'gallery' => 'array',
        'tools' => 'array',
        'featured' => 'boolean',
        'order' => 'integer',
    ];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
