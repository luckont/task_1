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
        try {

            $input = $request->all();

            CreatePostsValidator::validateForm($input);

            $data = $this->model->create($input);

            return $data;
        } catch (\Exception $e) {

            return response()->json($e->getMessage(), 401);
        }
    }

    public function updatePosts(Request $request, $id)
    {
        try {

            $input = $request->all();

            UpdatePostsValidator::validateForm($input);

            $data = $this->model->update($input, $id);

            return $data;
        } catch (\Exception $e) {

            return response()->json($e->getMessage(), 401);
        }
    }
}
