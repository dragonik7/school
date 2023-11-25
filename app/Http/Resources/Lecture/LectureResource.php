<?php

namespace App\Http\Resources\Lecture;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Lecture */
class LectureResource extends JsonResource {

    public function toArray(Request $request): array {
        return [
            'id'          => $this->id,
            'name'        => $this->name,
            'students'    => $this->whenLoaded('students'),
            'groups'      => $this->whenLoaded('groups'),
            'description' => $this->description,
            'created_at'  => $this->created_at,
        ];
    }
}
