<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PrendaSubProceso;
use App\Http\Requests\PrendaSubProcesoRequest;
use App\Http\Resources\PrendaSubProcesoResource;

class PrendaSubProcesoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prendaSubProcesos = PrendaSubProceso::with('prenda_proceso')->paginate(15);
        $resource = PrendaSubProcesoResource::collection($prendaSubProcesos);

        return $this->successResponse(
            $resource,
            'Sub-procesos de prendas obtenidos correctamente',
            200
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PrendaSubProcesoRequest $request)
    {
        $prendaSubProcesos = PrendaSubProceso::create($request->validated());
        $resource = new PrendaSubProcesoResource($prendaSubProcesos);

        return $this->successResponse(
            $resource,
            'Sub-proceso de prenda creado correctamente',
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $prendaSubProcesos = PrendaSubProceso::findOrFail($id);
        $resource = new PrendaSubProcesoResource($prendaSubProcesos);

        return $this->successResponse(
            $resource,
            'Sub-proceso de prenda encontrado',
            200
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PrendaSubProcesoRequest $request, string $id)
    {
        $prendaSubProceso = PrendaSubProceso::findOrFail($id);
        $prendaSubProceso->update($request->validated());

        $resource = new PrendaSubProcesoResource($prendaSubProceso);
        return $this->successResponse(
            $resource,
            'Sub-proceso de prenda actualizado',
            200
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $prendaSubProceso = PrendaSubProceso::findOrFail($id);
        $prendaSubProceso->delete();

        return $this->successResponse(
            null,
            'Sub-proceso de prenda eliminado',
            200
        );
    }
}
