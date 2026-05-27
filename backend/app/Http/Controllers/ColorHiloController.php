<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ColorHilo;
use App\Http\Requests\ColorHiloRequest;
use App\Http\Resources\ColorHiloResource;

class ColorHiloController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $coloresHilo = ColorHilo::paginate(15);
        $resuorce = ColorHiloResource::collection($coloresHilo);

        return $this->successResponse(
            $resuorce,
            'Colores de hilo obtenidos correctamente',
            200
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ColorHiloRequest $request)
    {
        $colorHilo = ColorHilo::create($request->validated());
        $resource = new ColorHiloResource($colorHilo);

        return $this->successResponse(
            $resource,
            'Color de hilo creado correctamente',
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $colorHilo = ColorHilo::findOrFail($id);
        $resource = new ColorHiloResource($colorHilo);

        return $this->successResponse(
            $resource,
            'Color de hilo encontrado',
            200
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ColorHiloRequest $request, string $id)
    {
        $colorHilo = ColorHilo::findOrFail($id);
        $colorHilo->update($request->validated());

        $resource = new ColorHiloResource($colorHilo);
        return $this->successResponse(
            $resource,
            'Color de hilo actualizado',
            200
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $colorHilo = ColorHilo::findOrFail($id);
        $colorHilo->delete();

        return $this->successResponse(
            null,
            'Color de hilo eliminado',
            200
        );
    }
}
