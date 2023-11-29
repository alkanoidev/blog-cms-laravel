<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Post;

class Category extends Model
{
    use HasFactory;
    protected $table = "category";

    public function posts(): BelongsToMany
    {
        return $this->belongsToMany(Post::class);
    }
}
