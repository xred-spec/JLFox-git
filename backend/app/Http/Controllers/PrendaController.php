<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prenda;
use App\Http\Requests\PrendaRequest;
use App\Http\Resources\PrendaResource;

class PrendaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prendas = Prenda::with('tipo_prenda')->paginate(15);
        $resource = PrendaResource::collection($prendas);

        return $this->successResponse(
            $resource,
            'Prendas obtenidas correctamente',
            200
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PrendaRequest $request)
    {
        $prenda = Prenda::create($request->validated());
        $resource = new PrendaResource($prenda);

        return $this->successResponse(
            $resource,
            'Prenda creada correctamente',
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $prenda = Prenda::findOrFail($id);
        $resource = new PrendaResource($prenda);

        return $this->successResponse(
            $resource,
            'Prenda encontrada',
            200
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PrendaRequest $request, string $id)
    {
        $prenda = Prenda::findOrFail($id);
        $prenda->update($request->validated());

        $resource = new PrendaResource($prenda);
        return $this->successResponse(
            $resource,
            'Prenda actualizada',
            200
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $prenda = Prenda::findOrFail($id);
        $prenda->delete();

        return $this->successResponse(
            null,
            'Prenda eliminada',
            200
        );
    }
}
