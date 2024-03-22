<?php

namespace App\Http\Controllers;

use App\Models\PostsModel;
use Illuminate\Http\Request;
use App\Http\Validators\CreatePostsValidator;
use App\Http\Validators\UpdatePostsValidator;

class PostsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected PostsModel $model;

    public function __construct(PostsModel $model)
    {
        $this->model = $model;
    }

    public function getOnePosts($id)
    {
        $data = $this->model->getOne($id);
        return $data;
    }

    public function getAllPosts(Request $request)
    {
        $data = $this->model->getAll($request);
        return $data;
    }

    public function createPosts(Request $request)
    {
        $input = $request->all();
        (new CreatePostsValidator())->validate($input);
        try {
            $data = $this->model->create($input);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 401);
        }
        return $data;
    }

    public function updatePosts(Request $request, $id)
    {
        $input = $request->all();
        (new UpdatePostsValidator())->validate($input);
        try {
            $data = $this->model->update($input, $id);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 401);
        }
        return $data;
    }
}
