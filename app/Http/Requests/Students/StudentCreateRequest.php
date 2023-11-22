<?php

namespace App\Http\Requests\Students;

use Illuminate\Foundation\Http\FormRequest;

class StudentCreateRequest extends FormRequest {

	public function rules() {
		return [
            'name'     => ['required', 'string', 'max:254'],
            'email'    => ['required', 'email', 'max:254'],
            'group_id' => ['required', 'exists:groups,id'],
		];
	}
}
