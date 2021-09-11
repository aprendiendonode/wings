<?php

namespace App\Http\Controllers;

use App\Models\Time;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\TimeRequest;
use App\Http\Resources\TimeResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class TimeController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        $this->authorize('viewAny', Time::class);

        return TimeResource::collection(Time::paginate());
    }

    public function show(Time $time): TimeResource
    {
        $this->authorize('view', Time::class);

        return new TimeResource($time);
    }

    public function store(TimeRequest $request): JsonResponse
    {
        $this->authorize('create', Label::class);

        $time = $this->auth_user->createTime($request->validate());

        return Response::json($time);
    }

    public function update(Time $time, TimeRequest $request): JsonResponse
    {
        $this->authorize('update', $time);

        $time->update($request->validate());

        return Response::json($time);
    }

    public function delete(Time $time): JsonResponse
    {
        $this->authorize('delete', $time);

        $time->delete();

        return Response::json($time);
    }

    public function restore(Time $time): JsonResponse
    {
        $this->authorize('restore', $time);

        $time->restore();

        return Response::json($time);
    }

    public function forceDelete(Time $time): JsonResponse
    {
        $this->authorize('forceDelete', $time);

        $time->forceDelete();

        return Response::json($time);
    }
}
