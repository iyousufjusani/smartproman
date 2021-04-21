<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TopicDetail extends Model
{
    protected $guarded = [];


    public function topic()
    {
        return $this->belongsTo(Topic::class,'topic_id');
    }

    public function type()
    {
        return $this->belongsTo(Type::class,'type_id');
    }

}
