<?php

namespace App\Http\Resources\Student;

use App\Http\Resources\Group\GroupResource;
use App\Http\Resources\Lecture\LectureResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Student */
class StudentResource extends JsonResource {

    public function toArray(Request $request): array {
        return [
            'id'         => $this->id,
            'name'       => $this->name,
            'email'      => $this->email,
            'group'      => new GroupResource($this->whenLoaded('group')),
            'lectures'   => LectureResource::collection($this->whenLoaded('lectures')),
            'created_at' => $this->created_at,
        ];
    }
}
