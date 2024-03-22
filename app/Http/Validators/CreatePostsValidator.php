<?php

namespace App\Http\Validators;

use App\Http\Validators\BaseValidator;

class CreatePostsValidator extends BaseValidator
{
    protected function rules()
    {
        return [
            'id' => 'exists:posts, id',
            'author_id' => 'integer',
            'title' => 'required|string|max:255',
            'content' => 'required|string|max:10000',
            'tags' => 'nullable|array',
            'category' => 'nullable|string|max:255'
        ];
    }

}
