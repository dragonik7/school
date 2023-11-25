<?php

namespace App\Http\Requests\Lecture;

use Illuminate\Foundation\Http\FormRequest;

class LectureUpdateRequest extends FormRequest {

    public function rules(): array {
        return [
            'name'        => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:12000'],
        ];
    }
}
