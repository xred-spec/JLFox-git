<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PrendaProceso;
use App\Models\Prenda;
use App\Http\Requests\PrendaProcesoRequest;
use App\Http\Resources\PrendaProcesoResource;
use App\Http\Resources\PrendaResource;

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

    public function indexWithProcess(Request $request) {
        $query = Prenda::with(
            'tipo_prenda.piezas.procesos', 
            'color_tela.tela', 
            'bordado.color_hilo', 
            'forro', 
            'inventario_prenda'
        );
        /*
        $resource = PrendaResource::collection($prendasProcesos);

        return $this->successResponse(
            $resource,
            'Procesos de prendas obtenidos correctamente',
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

        $prendasProcesos = $query->paginate(15);

        return PrendaResource::collection($prendasProcesos)->additional([
            'success' => true,
            'message' => 'Prendas con procesos obtenidas correctamente'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PrendaProcesoRequest $request)
    {
        $prendaId = $request->prenda_id;
        $procesosIds = $request->procesos;

        PrendaProceso::where('prenda_id', $prendaId)->delete();

        $insertData = [];
        foreach($procesosIds as $process) {
            $insertData[] = [
                'prenda_id' => $prendaId,
                'proceso_id' => $process['proceso_id'],
                'orden' => $process['orden'],
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        if(!empty($insertData)) {
            PrendaProceso::insert($insertData);
        }

        $nuevosRegistros = PrendaProceso::where('prenda_id', $prendaId)->get();
        $resource = PrendaProcesoResource::collection($nuevosRegistros);

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
