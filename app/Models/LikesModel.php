<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LikesModel extends Model
{

    protected $table = "likes";

    protected $fillable = [
        "id",
        "user_id",
        "posts_id",
        "created_at"
    ];

    public function posts(){
        return $this->belongsTo(PostsModel::class);
    }
}
