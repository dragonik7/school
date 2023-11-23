<?php

namespace App\Http\Resources\Students;

use App\Http\Resources\GroupResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Student */
class StudentsResource extends JsonResource {

    public function toArray(Request $request): array {
        return [
            'id'         => $this->id,
            'name'       => $this->name,
            'email'      => $this->email,
            'group'      => GroupResource::make($this->whenLoaded('group')),
            'created_at' => $this->created_at,
        ];
    }
}
