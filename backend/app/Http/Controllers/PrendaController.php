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
    public function indexAll()
    {
        $prendas = Prenda::with(
            'tipo_prenda', 
            'color_tela.tela', 
            'bordado.color_hilo', 
            'forro'
        )->get();
        $resource = PrendaResource::collection($prendas);

        return $this->successResponse(
            $resource,
            'Prendas obtenidas correctamente',
            200
        );
    }
    
     public function index(Request $request)
    {
        $query = Prenda::with(
            'tipo_prenda', 
            'color_tela.tela', 
            'bordado.color_hilo', 
            'forro'
        );
        /*
        $resource = PrendaResource::collection($prendas);

        return $this->successResponse(
            $resource,
            'Prendas obtenidas correctamente',
            200
        );
        */

        if($request->filled('tipo')) {
            $query->where('tipo', $request->tipo);
        }

        if($request->filled('tipo_prenda_id')) {
            $query->where('tipo_prenda_id', $request->tipo_prenda_id);
        }

        if($request->filled('color_tela_id')) {
            $query->where('color_tela_id', $request->color_tela_id);
        }

        if($request->filled('bordado_id')) {
            $query->where('bordado_id', $request->bordado_id);
        }

        if($request->filled('forro_id')) {
            $query->where('forro_id', $request->forro_id);
        }

        $prendas = $query->paginate(15);

        return PrendaResource::collection($prendas)->additional([
            'success' => true,
            'message' => 'Prendas obtenidas correctamente'
        ]);
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
