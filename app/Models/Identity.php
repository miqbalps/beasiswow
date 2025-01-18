<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Identity extends Model
{
    // Specify NIK as the primary key
    protected $primaryKey = 'nik';

    // Disable auto-incrementing for primary key
    public $incrementing = false;

    // Specify the key type if it's not an integer
    protected $keyType = 'string';

    protected $fillable = [
        'nik',
        'user_id',
        'nkk',
        'birth_place',
        'birth_date',
        'gender',
        'married',
        'religion',
        'phone',
        'child_number',
        'origin',
        'income',
        'kk_file',
        'ktp_photo',
        'pass_photo'
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

    public function achievements()
    {
        return $this->hasMany(Achievement::class, 'nik', 'nik');
    }
}
