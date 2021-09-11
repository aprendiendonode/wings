<?php

namespace App\Task\Controllers;

use Domain\Task\Models\Task;
use Support\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Task\Requests\TaskRequest;
use App\Task\Resources\TaskResource;
use App\Task\Requests\TaskAssigneesRequest;
use App\Task\Requests\TaskReviewersRequest;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Auth;

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

        $task = Auth::user()->createTask($request->validate());

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
