<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Lote;
use App\Models\Prenda;
use App\Models\PrendaLote;
use App\Models\PrendaLotePieza;
use App\Models\InventarioPrenda;
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
        $lotes = Lote::with('prendas_lote.prenda.tipo_prenda.piezas.procesos')->where('estado', 'pendiente')->paginate(15);
        $resuorce = LoteResource::collection($lotes);

        return $this->successResponse(
            $resuorce,
            'Lotes obtenidos correctamente',
            200
        );
    }

    public function indexProduccion()
    {
        $lotes = Lote::with('prendas_lote.prenda.tipo_prenda.piezas.procesos')->where('estado', 'produccion')->paginate(15);
        $resuorce = LoteResource::collection($lotes);

        return $this->successResponse(
            $resuorce,
            'Lotes obtenidos correctamente',
            200
        );
    }

    public function indexTerminados()
    {
        $lotes = Lote::with('prendas_lote.prenda.tipo_prenda.piezas.procesos')->where('estado', 'terminado')->paginate(15);
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

            foreach($request->prendas as $prendaReq) {
                $prendaLote = PrendaLote::create([
                    'lote_id' => $newLote->id,
                    'prenda_id' => $prendaReq['prenda_id'],
                    'cantidad_prevista' => $prendaReq['cantidad'],
                    'cantidad_final_prenda' => $newLote->estado === 'terminado' ? $prendaReq['cantidad'] : null,
                ]);

                $prendaCatalogo = Prenda::with('tipo_prenda.piezas')->findOrFail($prendaReq['prenda_id']);
                $piezasInsert = [];

                
                foreach($prendaCatalogo->tipo_prenda->piezas as $pieza) {
                    $piezasInsert[] = [
                        'prenda_lote_id' => $prendaLote->id,
                        'prenda_pieza_id' => $pieza->id,
                        'proceso_actual' => null, 
                        'cantidad_proceso' => null,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];
                }

                if(!empty($piezasInsert)) {
                    PrendaLotePieza::insert($piezasInsert);
                }
            }

            return $newLote;
        });
        
        $resource = LoteResource::make($lote);

        return $this->successResponse(
            $resource,
            'Lote y desglose de piezas creados correctamente',
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
        );$request->validate([
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
            'cantidad_proceso' => 'nullable|integer',
        ]);
        
        $trackingPieza = PrendaLotePieza::findOrFail($id);
        
        $trackingPieza->proceso_actual = $newProcess['proceso_actual'];
        $trackingPieza->cantidad_proceso = $newProcess['cantidad_proceso'];
        $trackingPieza->save();

        return $this->successResponse(
            $trackingPieza,
            'Proceso de la pieza actualizado',
            200
        );
    }

    public function closePieceProduction(Request $request, string $id) {
        $request->validate([
            'cantidad_final_pieza' => 'required|integer'
        ]);

        $prendaLotePieza = DB::transaction(function () use ($request, $id) {
            $piezaLote = PrendaLotePieza::findOrFail($id);
            $piezaLote->cantidad_final_pieza = $request->cantidad_final_pieza;
            $piezaLote->save();

            return $piezaLote;
        });

        $resource = $prendaLotePieza;
        return $this->successResponse(
            $resource,
            'Producción de pieza terminada',
            200
        );
    }

    public function closeProduction(Request $request, string $id) {
        $request->validate([
            'cantidad_final_prenda' => 'required|integer',
        ]);

        $prendaLote = DB::transaction(function () use ($request, $id) {
            $lote = PrendaLote::findOrFail($id);
            $lote->cantidad_final_prenda = $request->cantidad_final_prenda; 
            $lote->save();

            $inventarioPrenda = InventarioPrenda::firstOrNew(['prenda_id' => $lote->prenda_id]);
            $inventarioPrenda->cantidad = ($inventarioPrenda->cantidad ?? 0) + $request->cantidad_final; 
            $inventarioPrenda->save();

            return $lote;
        });

        $resource = $prendaLote;
        return $this->successResponse(
            $resource,
            'Producción terminada e inventario actualizado',
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
