<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PrendaProceso;
use App\Http\Requests\PrendaProcesoRequest;
use App\Http\Resources\PrendaProcesoResource;

class PrendaProcesoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prendasProcesos = PrendaProceso::with('prenda', 'proceso')->paginate(15);
        $resource = PrendaProcesoResource::collection($prendasProcesos);

        return $this->successResponse(
            $resource,
            'Procesos de prendas obtenidos correctamente',
            200
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PrendaProcesoRequest $request)
    {
        $prendaProceso = PrendaProceso::create($request->validated());
        $resource = new PrendaProcesoResource($prendaProceso);

        return $this->successResponse(
            $resource,
            'Proceso de prenda creado correctamente',
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $prendaProceso = PrendaProceso::findOrFail($id);
        $resource = new PrendaProcesoResource($prendaProceso);

        return $this->successResponse(
            $resource,
            'Proceso de prenda encontrado',
            200
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PrendaProcesoRequest $request, string $id)
    {
        $prendaProceso = PrendaProceso::findOrFail($id);
        $prendaProceso->update($request->validated());

        $resource = new PrendaProcesoResource($prendaProceso);
        return $this->successResponse(
            $resource,
            'Proceso de prenda actualizado',
            200
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $prendaProceso = PrendaProceso::findOrFail($id);
        $prendaProceso->delete();

        return $this->successResponse(
            null,
            'Proceso de prenda eliminado',
            200
        );
    }
}
