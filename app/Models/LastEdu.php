<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LastEdu extends Model
{
    protected $fillable = [
        'nik',
        'semester',
        'gpa',
        'transcript_file'
    ];

    public function identity()
    {
        return $this->belongsTo(Identity::class, 'nik', 'nik');
    }
}
