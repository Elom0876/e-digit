<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'name',
        'description',
        'icon',
        'price_from',
    ];

    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}
