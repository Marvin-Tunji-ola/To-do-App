<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $guarded = [];

    public static function scopeCompleted($query)
    {
        return $query->where('iscomplete',1)->get();
    }

    public static function scopeInComplete($query)
    {
        return $query->where('iscomplete',0)->get();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
