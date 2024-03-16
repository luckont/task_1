<?php

namespace App\Models;

use App\Models\Posts;

class PostsModel
{
    protected Posts $posts;

    public function __construct(Posts $posts)
    {
        $this->posts = $posts;
    }


    public function getAll($request)
    {

        $page = $request->query('page', 1);
        $limit = $request->query('limit', 2);
        $offset = ($page - 1) * $limit;

        $data = $this->posts
            ->with("likes", "shares", "views", "comments")
            ->offset($offset)
            ->limit($limit)
            ->get();

        return $data;
    }

    public function create($input)
    {

        $now = date('Y-m-d H:i:s', time());
        $author_id = "123456789"; //currentId

        $newPosts = new Posts();

        $newPosts->fill([
            'author_id' => $author_id,
            'title' => $input['title'],
            'content' => $input['content'],
            'media' => isset($input['media']) ? json_encode($input['media']) : NULL,
            'tags' => isset($input['tags']) ? json_encode($input['tags']) : NULL,
            'category_id' => isset($input['category_id']) ? $input['category_id'] : NULL,
            'created_at' => $now
        ]);

        $newPosts->save();

        return $newPosts;
    }

    public function update($input, $id)
    {
        $now = date('Y-m-d H:i:s', time());
        $newPosts = Posts::find($id);
        $author = $newPosts->author_id;

        if (!$newPosts) {
            return "Posts not found !";
        }

        if (empty($input['author_id']) || $author !== $input['author_id']) {
            return "You are not authenticated !";
        } //Middleware 

        //Xu ly media, tag o Fronend
        $newPosts->title = isset($input['title']) ? $input['title'] : $newPosts->title;
        $newPosts->content = isset($input['content']) ? $input['content'] : $newPosts->content;
        $newPosts->media = isset($input['media']) ? json_encode($input['media']) : $newPosts->media;
        $newPosts->tags = isset($input['tags']) ? json_encode($input['tags']) : $newPosts->tags;
        $newPosts->category_id = isset($input['category_id']) ? $input['category_id'] : $newPosts->category_id;
        $newPosts->updated_at = $now;

        $newPosts->save();

        return $newPosts;
    }
}
