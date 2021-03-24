<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $guarded = [];

    public function topics()
    {
        return $this->hasMany(Topic::class);
    }
}
