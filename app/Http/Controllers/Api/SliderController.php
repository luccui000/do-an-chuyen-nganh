<?php

namespace App\Http\Controllers\Api;

use App\Factories\SliderFactory;
use App\Http\Controllers\Controller;
use App\Http\Requests\Slider\Create;
use App\Models\Slider;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::all();

        return new JsonResponse(
            data: Slider::all(),
            status: 200
        );
    }

    public function store(Create $request)
    {

        $slider_id = Slider::insertGetId(
            SliderFactory::make(
                $request->all()
            )->toArray()
        );
        return new JsonResponse(
            data: Slider::findOrFail($slider_id),
            status: 201
        );
    }

    public function show($id)
    {
        return new JsonResponse(
            data: Slider::findOrFail($id),
            status: 201
        );
    }

    public function update(Request $request, $id)
    {
//        $formData = SliderFactory::make(
//            $request->all()
//        )->toArray();
        return new JsonResponse(
            data: $request->all(),
            status: 201
        );
    }

    public function destroy($id)
    {
        $slider = Slider::findOrFail($id);
        $slider->delete();
        return new JsonResponse(
            data: "Xóa thành công",
            status: 200
        );
    }
}
