<?php

namespace App\Http\Controllers;

use App\Models\Label;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\LabelRequest;
use App\Http\Resources\LabelResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class LabelController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        $this->authorize('viewAny', Label::class);

        return LabelResource::collection(Label::paginate());
    }

    public function show(Label $label): LabelResource
    {
        $this->authorize('view', Label::class);

        return new LabelResource($label);
    }

    public function store(LabelRequest $request): JsonResponse
    {
        $this->authorize('create', Label::class);

        $label = $this->auth_user->createLabel($request->validate());

        return Response::json($label);
    }

    public function update(Label $label, LabelRequest $request): JsonResponse
    {
        $this->authorize('update', $label);

        $label->update($request->validate());

        return Response::json($label);
    }

    public function delete(Label $label): JsonResponse
    {
        $this->authorize('delete', $label);

        $label->delete();

        return Response::json($label);
    }

    public function restore(Label $label): JsonResponse
    {
        $this->authorize('restore', $label);

        $label->restore();

        return Response::json($label);
    }

    public function forceDelete(Label $label): JsonResponse
    {
        $this->authorize('forceDelete', $label);

        $label->forceDelete();

        return Response::json($label);
    }
}
