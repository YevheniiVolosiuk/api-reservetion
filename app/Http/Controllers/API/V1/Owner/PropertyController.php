<?php

namespace App\Http\Controllers\API\V1\Owner;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\Property\StorePropertyRequest;
use App\Models\Property;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function index(): JsonResponse
    {
        $this->authorize('properties-manage');

        // Will implement property management later
        return response()->json(['success' => true]);
    }

    public function store(StorePropertyRequest $request): Property
    {
        $this->authorize('properties-manage');

        return Property::create($request->validated());
    }
}
