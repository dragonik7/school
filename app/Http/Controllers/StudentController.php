<?php

namespace App\Http\Controllers;

use App\Http\Requests\Student\StudentCreateRequest;
use App\Http\Requests\Student\StudentUpdateRequest;
use App\Http\Resources\Student\StudentResource;
use App\Models\Student;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;

class StudentController extends Controller {

    public function index(): JsonResource {
        return StudentResource::collection(Student::all());
    }

    public function store(StudentCreateRequest $request): JsonResource {
        $studentData = $request->validated();
        return new StudentResource(Student::create($studentData));
    }

    public function show(int $studentId): JsonResource {
        $student = Student::with('lectures')->findOrFail($studentId);
        return new StudentResource($student);
    }

    public function update(StudentUpdateRequest $request, Student $student): JsonResource {
        $student->update($request->validated());
        return new StudentResource($student);
    }

    public function destroy(Student $student): JsonResponse {
        $student->delete();
        return response()->json(['deleted'], 204);
    }
}
