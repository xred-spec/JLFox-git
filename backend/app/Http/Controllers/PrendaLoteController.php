<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PrendaLote;
use App\Http\Requests\PrendaLoteRequest;
use App\Http\Resources\PrendaLoteResource;

class PrendaLoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prendasLote = PrendaLote::with('lote', 'prenda_proceso')->paginate(15);
        $resuorce = PrendaLoteResource::collection($prendasLote);

        return $this->successResponse(
            $resuorce,
            'Prendas-lotes obtenidos correctamente',
            200
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PrendaLoteRequest $request)
    {
        $prendaLote = PrendaLote::create($request->validated());
        $resource = new PrendaLoteResource($prendaLote);

        return $this->successResponse(
            $resource,
            'Prenda-Lote creado correctamente',
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $prendaLote = PrendaLote::findOrFail($id);
        $resource = new PrendaLoteResource($prendaLote);

        return $this->successResponse(
            $resource,
            'Prenda-Lote encontrado',
            200
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PrendaLoteRequest $request, string $id)
    {
        $prendaLote = PrendaLote::findOrFail($id);
        $prendaLote->update($request->validated());

        $resource = new PrendaLoteResource($prendaLote);
        return $this->successResponse(
            $resource,
            'Prenda-Lote actualizado',
            200
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $prendaLote = PrendaLote::findOrFail($id);
        $prendaLote->delete();

        return $this->successResponse(
            null,
            'Prenda-Lote eliminado',
            200
        );
    }
}
