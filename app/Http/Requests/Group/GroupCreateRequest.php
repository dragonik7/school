<?php

namespace App\Http\Requests\Group;

use Illuminate\Foundation\Http\FormRequest;

class GroupCreateRequest extends FormRequest {

	public function rules(): array {
		return [
			'name' => ['required', 'string', 'max:255'],
		];
	}
}
