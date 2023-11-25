<?php

namespace App\Http\Resources\Group;

use App\Http\Resources\Lecture\LectureResource;
use App\Http\Resources\Student\StudentResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Group */
class GroupResource extends JsonResource {

    public function toArray(Request $request): array {
        return [
            'id'         => $this->id,
            'name'       => $this->name,
            'students'   => StudentResource::collection($this->whenLoaded('students')),
            'lectures'   => LectureResource::collection($this->whenLoaded('lectures')),
            'created_at' => $this->created_at,
        ];
    }
}
