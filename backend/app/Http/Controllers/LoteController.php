<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Lote;
use App\Models\PrendaLote;
use App\Http\Requests\LoteRequest;
use App\Http\Resources\LoteResource;
use App\Http\Resources\PrendaLoteResource;

class LoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function indexPendientes()
    {
        $lotes = Lote::with('prendas_lote.prenda.prenda_procesos')->where('estado', 'pendiente')->paginate(15);
        $resuorce = LoteResource::collection($lotes);

        return $this->successResponse(
            $resuorce,
            'Lotes obtenidos correctamente',
            200
        );
    }

    public function indexProduccion()
    {
        $lotes = Lote::with('prendas_lote.prenda.prenda_procesos')->where('estado', 'produccion')->paginate(15);
        $resuorce = LoteResource::collection($lotes);

        return $this->successResponse(
            $resuorce,
            'Lotes obtenidos correctamente',
            200
        );
    }

    public function indexTerminados()
    {
        $lotes = Lote::with('prendas_lote.prenda.prenda_procesos')->where('estado', 'terminado')->paginate(15);
        $resuorce = LoteResource::collection($lotes);

        return $this->successResponse(
            $resuorce,
            'Lotes obtenidos correctamente',
            200
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LoteRequest $request)
    {
        $lote = DB::transaction(function () use ($request) {
            $newLote = Lote::create([
                'estado' => $request->estado,
                'fecha_inicio' => $request->fecha_inicio,
                'fecha_final' => $request->fecha_final,
            ]);

            $prendas = $request->prendas;
            $insertData = [];

            foreach($prendas as $prenda) {
                $insertData[] = [
                    'lote_id' => $newLote->id,
                    'prenda_id' => $prenda['prenda_id'],
                    'cantidad_prevista' => $prenda['cantidad'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }

            if(!empty($insertData)) {
                PrendaLote::insert($insertData);
            }

            return $newLote;
        });
        
        $resource = LoteResource::make($lote);

        return $this->successResponse(
            $resource,
            'Lote y prendas creados correctamente',
            201
        );
    }

    /**
     * Display the specified resource.
     */
    /*
    public function show(string $id)
    {
        $lote = Lote::findOrFail($id);
        $resource = new LoteResource($lote);

        return $this->successResponse(
            $resource,
            'Lote encontrado',
            200
        );
    }
    */

    /**
     * Update the specified resource in storage.
     */
    public function update(LoteRequest $request, string $id)
    {
        $lote = DB::transaction(function () use ($request, $id) {
            $storedLote = Lote::findOrFail($id);
            $storedLote->update([
                'estado' => $request->estado,
                'fecha_inicio' => $request->fecha_inicio,
                'fecha_final' => $request->fecha_final
            ]);

            PrendaLote::where('lote_id', $storedLote->id)->delete();
            $prendas = $request->prendas;
            $insertData = [];

            foreach($prendas as $prenda) {
                $insertData[] = [
                    'lote_id' => $storedLote->id,
                    'prenda_id' => $prenda['prenda_id'],
                    'cantidad_prevista' => $prenda['cantidad'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }

            if(!empty($insertData)) {
                PrendaLote::insert($insertData);
            }

            return $storedLote;
        });
        
        $resource = LoteResource::make($lote);

        return $this->successResponse(
            $resource,
            'Lote y prendas editados correctamente',
            200
        );
    }

    public function updateState(Request $request, string $id) {
        $request->validate([
            'estado' => 'required|string|min:1',
        ]);
        $state = $request->estado;

        $lote = Lote::findOrFail($id);

        $insertData = [
            'estado' => $state
        ];

        if($state === 'produccion' && is_null($lote->fecha_inicio)) {
            $insertData['fecha_inicio'] = now();
        } else if($state === 'terminado' && is_null($lote->fecha_final)) {
            $insertData['fecha_final'] = now();
        }

        $lote->update($insertData);
        $resource = LoteResource::make($lote);

        return $this->successResponse(
            $resource,
            'Estado del lote actualizado correctamente',
            200
        );
    } 

    public function updateCurrentProcess(Request $request, string $id) {
        $newProcess = $request->validate([
            'proceso_actual' => 'required|integer|min:1',
            'cantidad_proceso' => 'nullable|integer'
        ]);

        $prendaLote = PrendaLote::findOrFail($id);
        $prendaLote->proceso_actual = $newProcess['proceso_actual'];
        $prendaLote->cantidad_proceso = $newProcess['cantidad_proceso'];
        $prendaLote->save();

        $resource = $prendaLote;
        return $this->successResponse(
            $resource,
            'Proceso actual ctualizado',
            200
        );
    }

    public function closeProduction(Request $request, string $id) {
        $request->validate([
            'cantidad_final' => 'required|integer'
        ]);

        $prendaLote = PrendaLote::findOrFail($id);

        $prendaLote->cantidad_final = $request->cantidad_final; 
        $prendaLote->save();

        $resource = $prendaLote;
        return $this->successResponse(
            $resource,
            'Estado actual ctualizado',
            200
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $lote = Lote::findOrFail($id);
        $lote->delete();

        return $this->successResponse(
            null,
            'Lote eliminado',
            200
        );
    }
}
