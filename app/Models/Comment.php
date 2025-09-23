<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    
    protected $fillable = ['forum_id', 'user_id', 'parent_id', 'comment'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function forum() {
        return $this->belongsTo(Forum::class);
    }

    public function replies() {
        return $this->hasMany(Comment::class, 'parent_id');
    }

    public function likes() {
        return $this->hasMany(CommentLike::class);
    }

    public function attachments() {
        return $this->hasMany(CommentAttachment::class);
    }
}
