<?php

namespace App\Http\Controllers\Api;

use App\Factories\QuyCachFactory;
use App\Http\Controllers\Controller;
use App\Http\Requests\QuyCachRequest;
use App\Models\QuyCach;
use App\Transformers\QuyCachTransformer;
use Illuminate\Http\JsonResponse;

class QuyCachController extends Controller
{
    public function index()
    {
        $quycachs = QuyCach::all();
        return fractal($quycachs, new QuyCachTransformer())
            ->respond(JsonResponse::HTTP_OK, [], JSON_PRETTY_PRINT);
    }

    public function store(QuyCachRequest $request)
    {
        $quycach = QuyCach::create(
            QuyCachFactory::make($request->all())->toArray()
        );

        return fractal($quycach, new QuyCachTransformer())
            ->respond(JsonResponse::HTTP_OK, [], JSON_PRETTY_PRINT);
    }

    public function show($id)
    {
        $quycach = QuyCach::findOrFail($id);

        return fractal($quycach, new QuyCachTransformer())
            ->respond(JsonResponse::HTTP_OK, [], JSON_PRETTY_PRINT);
    }

    public function update(QuyCachRequest $request, $id)
    {
        $quycach = QuyCach::findOrFail($id);
        $quycach->update(
            QuyCachFactory::make($request->all())->toArray()
        );
        return fractal($quycach, new QuyCachTransformer())
            ->respond(JsonResponse::HTTP_OK, [], JSON_PRETTY_PRINT);
    }

    public function destroy($id)
    {
        //
    }
}
