<?php

namespace App\Http\Validators;

use Illuminate\Support\Facades\Validator;

class CreatePostsValidator
{
    public static function validateForm(array $data)
    {
        $validator = Validator::make(
            $data,
            [
                'id' => 'exists:posts, id',
                'author_id' => 'string',
                'title' => 'required|string|max:255',
                'content' => 'required|string|max:10000',
                'tags' => 'nullable|array',
                'category_id' => 'nullable|string|max:255'
            ]
        );
        return $validator->validate();
    }
}
