<?php

namespace App\Models;

use App\Models\Application;
use Illuminate\Database\Eloquent\Model;

class Scholarship extends Model
{
    protected $fillable = [
        'name',
        'description',
        'start_date',
        'end_date',
        'requirements',
        'status'
    ];

    protected $casts = [
        'requirements' => 'array',
        'start_date' => 'date',
        'end_date' => 'date'
    ];

    public function applications()
    {
        return $this->hasMany(Application::class);
    }
}