<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Comment;

class News extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'title', 'content'];

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable')->whereNull('parent_id')->latest('id');
    }

    public function parentApprovedComments()
    {
        return $this->morphMany(Comment::class, 'commentable')->whereNull('parent_id')->where('status', 1)->latest('id');
    }

    public function allApprovedComments()
    {
        return $this->morphMany(Comment::class, 'commentable')->where('status', 1)->latest('id');
    }
}
