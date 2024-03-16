<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommentsModel extends Model
{

    protected $table = "comments";

    protected $fillable = [
        "id",
        "user_id",
        "posts_id",
        "content",
        "created_at"
    ];

    public function posts(){
        return $this->belongsTo(PostsModel::class);
    }
}
