<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AreaProduccion;
use App\Http\Requests\AreaProduccionRequest;
use App\Http\Resources\AreaProduccionResource;

class AreaProduccionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexAll() {
        $areas = AreaProduccion::all();
        $resource = AreaProduccionResource::collection($areas);

        return $this->successResponse(
            $resource,
            'Areas obtenidas correctamente',
            200
        );
    }

    public function index()
    {
        $areas = AreaProduccion::paginate(15);

        return AreaProduccionResource::collection($areas)->additional([
            'success' => true,
            'message' => 'Areas obtenidas correctamente',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AreaProduccionRequest $request)
    {
        $area = AreaProduccion::create($request->validated());
        $resource = new AreaProduccionResource($area);

        return $this->successResponse(
            $resource,
            'Area creada correctamente',
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $area = AreaProduccion::findOrFail($id);
        $resource = new AreaProduccionResource($area);

        return $this->successResponse(
            $resource,
            'Area encontrada',
            200
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AreaProduccionRequest $request, string $id)
    {
        $area = AreaProduccion::findOrFail($id);
        $area->update($request->validated());

        $resource = new AreaProduccionResource($area);
        return $this->successResponse(
            $resource,
            'Area actualizada',
            200
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $area = AreaProduccion::findOrFail($id);
        $area->delete();

        return $this->successResponse(
            null,
            'Area eliminada',
            200
        );
    }
}
