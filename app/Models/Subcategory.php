<?php

namespace App\Models;

use App\Models\Forum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subcategory extends Model
{
    use HasFactory;
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function forums()
    {
        return $this->hasMany(Forum::class);
    }
}
