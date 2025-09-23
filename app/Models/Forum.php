<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    use HasFactory;
    
    protected $fillable = ['user_id', 'subcategory_id', 'title', 'description'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function subcategory() {
        return $this->belongsTo(Subcategory::class);
    }

    public function comments() {
        return $this->hasMany(Comment::class)->whereNull('parent_id');
    }

    public function likes() {
        return $this->hasMany(ForumLike::class);
    }

    public function attachments() {
        return $this->hasMany(ForumAttachment::class);
    }
}
