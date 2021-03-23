<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $guarded  = [];

    public function imageable()
    {
        return $this->morphTo();
    }
   public function user()
   {
    return $this->belongsToThrough(
        User::class,
        Post::class,
        'post_id',
        'user_id',
        'id',
        'id'
);
   }
}
