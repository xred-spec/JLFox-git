<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InventarioPrenda;
use App\Http\Requests\InventarioPrendaRequest;
use App\Http\Resources\InventarioPrendaResource;

class InventarioPrendaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $inventarioPrenda = InventarioPrenda::with('prenda')->paginate(15);
        $resuorce = InventarioPrendaResource::collection($inventarioPrenda);

        return $this->successResponse(
            $resuorce,
            'Inventario de prendas obtenido correctamente',
            200
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(InventarioPrendaRequest $request)
    {
        $inventarioPrenda = InventarioPrenda::create($request->validated());
        $resource = new InventarioPrendaResource($inventarioPrenda);

        return $this->successResponse(
            $resource,
            'Inventario de prenda creado correctamente',
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $inventarioPrenda = InventarioPrenda::findOrFail($id);
        $resource = new InventarioPrendaResource($inventarioPrenda);

        return $this->successResponse(
            $resource,
            'Inventario de prenda encontrado',
            200
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(InventarioPrendaRequest $request, string $id)
    {
        $inventarioPrenda = InventarioPrenda::findOrFail($id);
        $inventarioPrenda->update($request->validated());

        $resource = new InventarioPrendaResource($inventarioPrenda);
        return $this->successResponse(
            $resource,
            'Inventario de prenda actualizado',
            200
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $inventarioPrenda = InventarioPrenda::findOrFail($id);
        $inventarioPrenda->delete();

        return $this->successResponse(
            null,
            'Inventario de prenda eliminado',
            200
        );
    }
}
