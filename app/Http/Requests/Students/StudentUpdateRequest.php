<?php

namespace App\Http\Requests\Students;

use Illuminate\Foundation\Http\FormRequest;

class StudentUpdateRequest extends FormRequest {

	public function rules(): array {
		return [
			'name'     => ['string', 'max:254'],
			'group_id' => ['integer', 'exists:groups,id'],
		];
	}
}
