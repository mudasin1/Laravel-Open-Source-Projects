<?php

namespace App\Domain\Projects\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'project_type',
        'catalog_letter',
        'homepage_url',
        'repository_url',
        'credit_name',
        'credit_url',
        'description',
        'is_featured',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
