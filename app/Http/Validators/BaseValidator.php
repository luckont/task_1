<?php

namespace App\Http\Validators;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

abstract class BaseValidator
{
    abstract protected function rules();

    protected $data;

    public function validate($input)
    {
        $this->data = $input;

        $validator = Validator::make($input, $this->rules(), $this->messages());

        $validator->setAttributeNames($this->attributes());

        if ($validator->fails()) {
            throw new HttpResponseException(
                response()->json([
                    $validator->errors(),
                ], 422)
            );
        }
        return response()->json($validator, 201);
    }

    protected function messages()
    {
        return [
            'required' => ':attribute bắt buộc nhập',
            'string' => ':attribute phải là ký tự',
            'integer' => ':attribute phải là số',
            'min' => ':attribute không nhỏ hơn :min ký tự',
            'max' => ':attribute không lớn hơn :max ký tự',
            'array' => ':attribute phải là mảng'
        ];
    }

    protected function attributes()
    {
        return [
            'title'=> 'Tiêu đề bài viết',
            'author_id' => 'ID Người tạo bài viết',
            'content' => 'Nội dung bài viết',
            'tags' => 'Thẻ bài viết',
            'category' => 'Phân loại bài viết'
        ];
    }
}
