<?php

namespace App\Http\Resources\Group;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Schedule */
class ScheduleResource extends JsonResource {

	public function toArray(Request $request): array {
		return [
			'id'            => $this->id,
			'lecture_id'    => $this->lecture_id,
			'created_at'    => $this->created_at,
		];
	}
}
