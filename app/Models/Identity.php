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

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function addresses()
    {
        return $this->hasMany(Address::class);
    }
}
