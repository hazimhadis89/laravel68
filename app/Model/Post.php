<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    protected $fillable = [
        'title', 'body',
    ];

    protected $hidden = [
        'user_id',
    ];

    protected $casts = [
        'user_id' => 'integer',
    ];

    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = Str::slug($value, '-');
    }

    public function user()
    {
        return $this->belongsTo('App\Model\User')->withTrashed();
    }
}
