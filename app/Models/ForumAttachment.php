<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ForumAttachment extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'forum_id', 'comment_id', 'file_path', 'file_name', 'file-size', 'file_extension'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function forum()
    {
        return $this->belongsTo(Forum::class);
    }
}
