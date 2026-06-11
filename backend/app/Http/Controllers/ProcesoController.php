<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proceso;
use App\Http\Requests\ProcesoRequest;
use App\Http\Resources\ProcesoResource;

class ProcesoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $procesos = Proceso::paginate(15);
        $resource = ProcesoResource::collection($procesos);

        return $this->successResponse(
            $resource,
            'Procesos obtenidos correctamente',
            200
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProcesoRequest $request)
    {
        $proceso = Proceso::create($request->validated());
        $resource = new ProcesoResource($proceso);

        return $this->successResponse(
            $resource,
            'Proceso creado correctamente',
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $proceso = Proceso::findOrFail($id);
        $resource = new ProcesoResource($proceso);

        return $this->successResponse(
            $resource,
            'Proceso encontrado',
            200
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProcesoRequest $request, string $id)
    {
        $proceso = Proceso::findOrFail($id);
        $proceso->update($request->validated());

        $resource = new ProcesoResource($proceso);
        return $this->successResponse(
            $resource,
            'Proceso actualizado',
            200
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $proceso = Proceso::findOrFail($id);
        $proceso->delete();

        return $this->successResponse(
            null,
            'Proceso eliminado',
            200
        );
    }
}
