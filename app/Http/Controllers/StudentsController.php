<?php

namespace App\Http\Controllers;

use App\Http\Requests\Students\StudentCreateRequest;
use App\Http\Requests\Students\StudentUpdateRequest;
use App\Http\Resources\Students\StudentResource;
use App\Http\Resources\Students\StudentsResource;
use App\Models\Students;

class StudentsController extends Controller {

	public function index() {
		return StudentsResource::collection(Students::all());
	}

	public function store(StudentCreateRequest $request) {
        $studentData = $request->validated();
		return new StudentsResource(Students::create($studentData));
	}

	public function show(Students $student) {
		return new StudentResource($student);
	}

	public function update(StudentUpdateRequest $request, Students $student) {
		$student->update($request->validated());
		return new StudentsResource($student);
	}

	public function destroy(Students $student) {
        $student->delete();
		return response('',204);
	}
}
