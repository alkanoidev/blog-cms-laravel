<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Category;

class Post extends Model
{
    use HasFactory;
    public $table = 'post';

    public $fillable = ["id"];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
