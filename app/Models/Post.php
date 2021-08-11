<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Redis;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Post extends Model implements HasMedia
{
    use HasFactory, SoftDeletes, InteractsWithMedia;

    protected $fillable = ['created_by', 'color', 'body'];

    protected $appends = ['comments_count'];

    public function creator(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class , 'created_by');
    }

    public function comments(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Comment::class, 'post_id');
    }

    public function getCommentsCountAttribute()
    {
        if(Redis::get("post:{$this->id}:comments:count")){
            return (int)Redis::get("post:{$this->id}:comments:count");
        }
        $count = $this->comments()->count();
        Redis::set("post:{$this->id}:comments:count", $count);
        return (int)$count;
    }
}
