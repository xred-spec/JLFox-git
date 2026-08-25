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
    public function indexAll() {
        $coloresHilo = ColorHilo::all();
        $resource = ColorHiloResource::collection($coloresHilo);

        return $this->successResponse(
            $resource,
            'Colores de hilo obtenidos correctamente',
            200
        );
    }

    public function index()
    {
        $coloresHilo = ColorHilo::paginate(15);
        /*
        $resource = ColorHiloResource::collection($coloresHilo);

        return $this->successResponse(
            $resource,
            'Colores de hilo obtenidos correctamente',
            200
        );
        */

        return ColorHiloResource::collection($coloresHilo)->additional([
            'success' => true,
            'message' => 'Colores de hilo obtenidos correctamente'
        ]);
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
