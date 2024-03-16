<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ViewsModel extends Model
{

    protected $table = "views";

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
