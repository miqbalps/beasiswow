<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Achievement extends Model
{
    protected $fillable = [
        'nik',
        'name',
        'type',
        'level',
        'rank',
        'year',
        'proof_file'
    ];

    public function identity()
    {
        return $this->belongsTo(Identity::class, 'nik', 'nik');
    }
}
