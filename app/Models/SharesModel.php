<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SharesModel extends Model
{

    protected $table = "shares";

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
