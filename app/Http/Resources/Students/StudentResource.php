<?php

namespace App\Http\Resources\Students;

use App\Http\Resources\GroupResource;
use App\Http\Resources\LectureResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Student */
class StudentResource extends JsonResource {

    public function toArray(Request $request): array {
        return [
            'id'         => $this->id,
            'name'       => $this->name,
            'email'      => $this->email,
            'group'      => GroupResource::make($this->whenLoaded('group')),
            'lectures'   => LectureResource::collection($this->lectures),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
