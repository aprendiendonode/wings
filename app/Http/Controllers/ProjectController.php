<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProjectRequest;
use App\Http\Resources\ProjectResource;
use App\Http\Requests\ProjectMembersRequest;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ProjectController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        $this->authorize('viewAny', Project::class);

        return ProjectResource::collection(Project::paginate());
    }

    public function show(Project $project): ProjectResource
    {
        $this->authorize('view', Project::class);

        return new ProjectResource($project);
    }

    public function store(ProjectRequest $request): JsonResponse
    {
        $this->authorize('create', Project::class);

        $project = $this->auth_user->createProject($request->validate());

        return Response::json($project);
    }

    public function update(Project $project, ProjectRequest $request): JsonResponse
    {
        $this->authorize('update', $project);

        $project->update($request->validate());

        return Response::json($project);
    }

    public function syncMembers(Project $project, ProjectMembersRequest $request): JsonResponse
    {
        $this->authorize('sync-members', $project);

        $project->syncMembers($request->validate());

        return Response::json($project);
    }

    public function delete(Project $project): JsonResponse
    {
        $this->authorize('delete', $project);

        $project->delete();

        return Response::json($project);
    }

    public function restore(Project $project): JsonResponse
    {
        $this->authorize('restore', $project);

        $project->restore();

        return Response::json($project);
    }

    public function forceDelete(Project $project): JsonResponse
    {
        $this->authorize('forceDelete', $project);

        $project->forceDelete();

        return Response::json($project);
    }
}
