<?php

namespace App\Models;
use App\Models\Comment as CommentModel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public function comments()
    {
        return $this->morphMany(CommentModel::class, 'commentable');
    }
}
