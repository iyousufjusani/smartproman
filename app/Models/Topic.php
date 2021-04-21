<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $guarded = [];

    public function type()
    {
        return $this->belongsTo(Type::class,'type_id');
    }

    public function details()
    {
        return $this->hasMany(TopicDetail::class);
    }

    public function pages()
    {
        return $this->hasMany(Page::class);
    }

    public function videos()
    {
        return $this->hasMany(Video::class);
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }


}
