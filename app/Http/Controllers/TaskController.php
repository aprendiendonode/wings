<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\TaskRequest;
use App\Http\Resources\TaskResource;
use App\Http\Requests\TaskAssigneesRequest;
use App\Http\Requests\TaskReviewersRequest;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class TaskController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        $this->authorize('viewAny', Task::class);

        return TaskResource::collection(Task::paginate());
    }

    public function show(Task $task): TaskResource
    {
        $this->authorize('view', Task::class);

        return new TaskResource($task);
    }

    public function store(TaskRequest $request): JsonResponse
    {
        $this->authorize('create', Label::class);

        $task = $this->auth_user->createTask($request->validate());

        return Response::json($task);
    }

    public function update(Task $task, TaskRequest $request): JsonResponse
    {
        $this->authorize('update', $task);

        $task->update($request->validate());

        return Response::json($task);
    }

    public function syncAssignees(Task $task, TaskAssigneesRequest $request): JsonResponse
    {
        $this->authorize('sync-assignees', $task);

        $task->syncAssignees($request->validate());

        return Response::json($task);
    }

    public function syncReviewers(Task $task, TaskReviewersRequest $request): JsonResponse
    {
        $this->authorize('sync-reviewers', $task);

        $task->syncReviewers($request->validate());

        return Response::json($task);
    }

    public function delete(Task $task): JsonResponse
    {
        $this->authorize('delete', $task);

        $task->delete();

        return Response::json($task);
    }

    public function restore(Task $task): JsonResponse
    {
        $this->authorize('restore', $task);

        $task->restore();

        return Response::json($task);
    }

    public function forceDelete(Task $task): JsonResponse
    {
        $this->authorize('forceDelete', $task);

        $task->forceDelete();

        return Response::json($task);
    }
}
