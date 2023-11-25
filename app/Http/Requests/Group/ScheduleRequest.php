<?php

namespace App\Http\Requests\Group;

use Illuminate\Foundation\Http\FormRequest;

class ScheduleRequest extends FormRequest {

	public function rules(): array {
		return [
			'*.lecture_id'    => ['required', 'exists:lectures,id'],
			'*.lecture_order' => ['required', 'integer'],
		];
	}
}
