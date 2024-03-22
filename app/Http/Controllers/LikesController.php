<?php

namespace App\Http\Controllers;

use App\Models\LikesModel;

/**
 *     @OA\Post(
 *     path="/posts/{$id}/like",
 *     description="Like a posts",
 *     @OA\RequestBody(
 *         required=true,
 *         description="Data of the like posts",
 *         @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                 type="object",
 *                 @OA\Property(property="author_id", type="number"),
 *                 @OA\Property(property="posts_id", type="number"),
 *                 @OA\Property(property="created_at", type="string", format="date-time"),
 * 
 *             )
 *         )
 *     ),
 * 
 *     @OA\Response(response="401", description="You have liked this posts !"),
 *     @OA\Response(response="200", description="You have liked this posts !")
 * )
 */

class LikesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    protected LikesModel $model;

    public function __construct(LikesModel $model)
    {
        $this->model = $model;
    }

    public function likePosts($id)
    {
        $user_id = "123456782";

        $data = $this->model->like($user_id, $id);

        return $data;
    }

    public function unlikePosts($id)
    {

        $user_id = "123456782";

        $data = $this->model->unlike($user_id, $id);

        return $data;
    }
}
