<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostSlider extends Model
{
    use HasFactory;

    protected $table = 'post_slider';
    protected $guarded = [];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
