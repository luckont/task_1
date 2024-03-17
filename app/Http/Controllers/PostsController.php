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

    public function getAllPosts(Request $request)
    {

        $data = $this->model->getAll($request);

        return response()->json($data);
    }

    public function createPosts(Request $request)
    {
        try {

            $input = $request->all();

            CreatePostsValidator::validateForm($input);

            $new = $this->model->create($input);

            return response()->json($new);
        } catch (\Exception $e) {

            return response()->json($e->getMessage());
        }
    }

    public function updatePosts(Request $request, $id)
    {
        try {

            $input = $request->all();

            UpdatePostsValidator::validateForm($input);

            $new = $this->model->update($input, $id);

            return response()->json($new);
        } catch (\Exception $e) {
            response()->json($e->getMessage());
        }
    }
}
