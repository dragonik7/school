<?php

namespace App\Http\Controllers;

use App\Http\Requests\Group\GroupCreateRequest;
use App\Http\Requests\Group\GroupUpdateRequest;
use App\Http\Requests\Group\ScheduleRequest;
use App\Http\Resources\Group\GroupResource;
use App\Models\Group;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;

class GroupController extends Controller {

    public function index(): JsonResource {
        return GroupResource::collection(Group::all());
    }

    public function store(GroupCreateRequest $request): JsonResource {
        return new GroupResource(Group::create($request->validated()));
    }
    public function update(GroupUpdateRequest $request, Group $group): JsonResource {
        $group->update($request->validated());
        return new GroupResource($group);
    }

    public function showGroupAndGetStudents(int $groupId): JsonResource {
        return new GroupResource(Group::with('students')->findOrFail($groupId));
    }

    public function showGroupAndGetLectures(int $groupId): JsonResource {
        return new GroupResource(Group::with('lectures')->findOrFail($groupId));

    }

    public function updateSchedule(ScheduleRequest $request, int $groupId): JsonResource {
        $data = $request->validated();
        $group = Group::findOrFail($groupId);
        $group->lectures()->sync($data);
        return new GroupResource($group);
    }

    public function destroy(Group $group): JsonResponse {
        $group->delete();
        return response()->json(['deleted'], 204);
    }
}
