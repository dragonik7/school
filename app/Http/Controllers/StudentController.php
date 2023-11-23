<?php

namespace App\Http\Controllers;

use App\Http\Requests\Students\StudentCreateRequest;
use App\Http\Requests\Students\StudentUpdateRequest;
use App\Http\Resources\Students\StudentResource;
use App\Http\Resources\Students\StudentsResource;
use App\Models\Student;

class StudentController extends Controller {

	public function index() {
		return StudentsResource::collection(Student::all());
	}

	public function store(StudentCreateRequest $request) {
        $studentData = $request->validated();
		return new StudentsResource(Student::create($studentData));
	}

	public function show(Student $student) {
		return new StudentResource($student);
	}

	public function update(StudentUpdateRequest $request, Student $student) {
		$student->update($request->validated());
		return new StudentsResource($student);
	}

	public function destroy(Student $student) {
        $student->delete();
		return response('',204);
	}
}
