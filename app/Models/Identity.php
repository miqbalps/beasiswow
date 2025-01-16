<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Identity extends Model
{
    protected $fillable = [
        'nik',
        'user_id',
        'name',
        'nkk',
        'birth_place',
        'birth_date',
        'gender',
        'married',
        'religion',
        'phone',
        'child_number',
        'origin',
        'income'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function families()
    {
        return $this->hasMany(Family::class, 'nik', 'nik');
    }

    public function addresses()
    {
        return $this->hasMany(Address::class, 'nik', 'nik');
    }

    public function last_edu()
    {
        return $this->hasOne(LastEdu::class, 'nik', 'nik');
    }
}
