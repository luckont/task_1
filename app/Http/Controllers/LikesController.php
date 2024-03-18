<?php

namespace App\Http\Controllers;

use App\Models\LikesModel;

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
