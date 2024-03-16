<?php

namespace App\Http\Validators;

use Illuminate\Support\Facades\Validator;

class UpdatePostsValidator
{
    public static function validateForm(array $data)
    {
        $validator = Validator::make(
            $data,
            [
                'id' => 'exists:posts, id',
                'author_id' => 'string',
                'title' => 'string|max:255',
                'content' => 'string|max:10000',
                'tags' => 'nullable|array', //array strinng
                'category_id' => 'nullable|string|max:255'
            ]
        );
        return $validator->validate();
    }
}
