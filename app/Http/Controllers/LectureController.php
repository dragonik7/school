<?php

namespace App\Http\Controllers;

use App\Http\Requests\Lecture\LectureCreateRequest;
use App\Http\Requests\Lecture\LectureUpdateRequest;
use App\Http\Resources\Lecture\LectureResource;
use App\Models\Lecture;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;

class LectureController extends Controller {

    public function index(): JsonResource {
        return LectureResource::collection(Lecture::all());
    }

    public function store(LectureCreateRequest $request): JsonResource {
        $studentData = $request->validated();
        return new LectureResource(Lecture::create($studentData));
    }

    public function show(int $lectureId): JsonResource {
        $lecture = Lecture::with(['students', 'groups'])->findOrFail($lectureId);
        return new LectureResource($lecture);
    }

    public function update(LectureUpdateRequest $request, Lecture $lecture): JsonResource {
        $lecture->update($request->validated());

        return new LectureResource($lecture);
    }

    public function destroy(Lecture $lecture): JsonResponse {
        $lecture->delete();

        return response()->json(['deleted'], 204);
    }
}
