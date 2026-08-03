<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoPrenda;
use App\Http\Requests\TipoPrendaRequest;
use App\Http\Resources\TipoPrendaResource;

class TipoPrendaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tiposPrendas = TipoPrenda::with('piezas.procesos')->paginate(15);
        $resource = TipoPrendaResource::collection($tiposPrendas);

        return $this->successResponse(
            $resource,
            'Tipos de prendas obtenidas correctamente',
            200
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TipoPrendaRequest $request)
    {
        $tipoPrenda = TipoPrenda::create($request->validated());
        $resource = new TipoPrendaResource($tipoPrenda);

        return $this->successResponse(
            $resource,
            'Tipo de prenda creada correctamente',
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $tipoPrenda = TipoPrenda::findOrFail($id);
        $resource = new TipoPrendaResource($tipoPrenda);

        return $this->successResponse(
            $resource,
            'Tipo de prenda encontrada',
            200
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TipoPrendaRequest $request, string $id)
    {
        $tipoPrenda = TipoPrenda::findOrFail($id);
        $tipoPrenda->update($request->validated());

        $resource = new TipoPrendaResource($tipoPrenda);
        return $this->successResponse(
            $resource,
            'Tipo de prenda actualizada',
            200
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tipoPrenda = TipoPrenda::findOrFail($id);
        $tipoPrenda->delete();

        return $this->successResponse(
            null,
            'Tipo de prenda eliminada',
            200
        );
    }
}
