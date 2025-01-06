<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    public function identity()
    {
        return $this->belongsTo(Identity::class);
    }
}
