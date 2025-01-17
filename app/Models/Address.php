<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
        'nik',
        'type',
        'street',
        'rt',
        'rw',
        'postal_code',
        'village',
        'district',
        'regency',
        'province'
    ];

    public function identity()
    {
        return $this->belongsTo(Identity::class, 'nik', 'nik');
    }
}
