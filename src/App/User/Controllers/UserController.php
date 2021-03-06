<?php

namespace App\User\Controllers;

use Support\Controllers\Controller;
use Domain\User\Models\User;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\User\Requests\UserRequest;
use App\User\Resources\UserResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        $this->authorize('viewAny', User::class);

        return UserResource::collection(User::paginate());
    }

    public function show(User $user): UserResource
    {
        $this->authorize('view', User::class);

        return new UserResource($user);
    }

    public function store(UserRequest $request): JsonResponse
    {
        $this->authorize('create', Label::class);

        $user = Auth::user()->createUser($request->validate());

        return Response::json($user);
    }

    public function update(User $user, UserRequest $request): JsonResponse
    {
        $this->authorize('update', $user);

        $user->update($request->validate());

        return Response::json($user);
    }

    public function delete(User $user): JsonResponse
    {
        $this->authorize('delete', $user);

        $user->delete();

        return Response::json($user);
    }

    public function restore(User $user): JsonResponse
    {
        $this->authorize('restore', $user);

        $user->restore();

        return Response::json($user);
    }

    public function forceDelete(User $user): JsonResponse
    {
        $this->authorize('forceDelete', $user);

        $user->forceDelete();

        return Response::json($user);
    }
}
