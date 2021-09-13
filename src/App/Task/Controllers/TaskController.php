<?php

namespace App\Task\Controllers;

use Domain\Task\Models\Task;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Task\Requests\TaskRequest;
use Domain\Project\Models\Project;
use Support\Controllers\Controller;
use App\Task\Resources\TaskResource;
use Domain\Task\Actions\CreateTaskAction;
use Domain\Task\Actions\DeleteTaskAction;
use Domain\Task\Actions\UpdateTaskAction;
use Domain\Task\Actions\RestoreTaskAction;
use App\Task\Requests\TaskAssigneesRequest;
use App\Task\Requests\TaskReviewersRequest;
use Domain\Task\DataTransferObjects\TaskData;
use Domain\Task\Actions\ForceDeleteTaskAction;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class TaskController extends Controller
{
    public function __construct(
        public CreateTaskAction $createTaskAction,
        public UpdateTaskAction $updateTaskAction,
        public DeleteTaskAction $deleteTaskAction,
        public RestoreTaskAction $restoreTaskAction,
        public ForceDeleteTaskAction $forceDeleteTaskAction,
    ) {
    }

    public function index(Project $project): AnonymousResourceCollection
    {
        $this->authorize('viewAny', [Task::class, $project]);

        return TaskResource::collection(Task::paginate());
    }

    public function show(Task $task): TaskResource
    {
        $this->authorize('view', $task);

        return new TaskResource($task);
    }

    public function store(Project $project, TaskRequest $request): JsonResponse
    {
        $this->authorize('create', [Task::class, $project]);

        $task = ($this->createTaskAction)(new TaskData($request->validated()));

        return Response::json($task);
    }

    public function update(Task $task, TaskRequest $request): JsonResponse
    {
        $this->authorize('update', $task);

        $task = ($this->updateTaskAction)($task, new TaskData($request->validated()));

        return Response::json($task);
    }

    public function syncAssignees(Task $task, TaskAssigneesRequest $request): JsonResponse
    {
        $this->authorize('sync-assignee', $task);

        // TODO: code here

        return Response::json($task);
    }

    public function syncReviewers(Task $task, TaskReviewersRequest $request): JsonResponse
    {
        $this->authorize('sync-reviewer', $task);

        // TODO: code here

        return Response::json($task);
    }

    public function delete(Task $task): JsonResponse
    {
        $this->authorize('delete', $task);

        $task = ($this->deleteTaskAction)($task);

        return Response::json($task);
    }

    public function restore(Task $task): JsonResponse
    {
        $this->authorize('restore', $task);

        $task = ($this->restoreTaskAction)($task);

        return Response::json($task);
    }

    public function forceDelete(Task $task): JsonResponse
    {
        $this->authorize('forceDelete', $task);

        $task = ($this->forceDeleteTaskAction)($task);

        return Response::json($task);
    }
}
