<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;

class Posts extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable, HasFactory;

    protected $table = 'posts';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'id',
        'author_id',
        'title',
        'content',
        'media',
        'tags',
        'category_id',
        'created_at',
        'updated_at',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var string[]
     */
    // protected $hidden = [
    //     'password',
    // ];

    //Relationship
    public function likes()
    {
        return $this->hasMany(LikesModel::class);
    }
    
    public function shares()
    {
        return $this->hasMany(SharesModel::class);
    }

    public function views()
    {
        return $this->hasMany(ViewsModel::class);
    }

    public function comments()
    {
        return $this->hasMany(CommentsModel::class);
    }
}
