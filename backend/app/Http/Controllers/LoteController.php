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
    public function index()
    {
        $lotes = Lote::with('prendas_lote')->paginate(15);
        $resuorce = LoteResource::collection($lotes);

        return $this->successResponse(
            $resuorce,
            'Lotes obtenidos correctamente',
            200
        );
    }

    public function indexPendientes()
    {
        $lotes = Lote::with('prendas_lote')->where('estado', 'pendiente')->paginate(15);
        $resuorce = LoteResource::collection($lotes);

        return $this->successResponse(
            $resuorce,
            'Lotes obtenidos correctamente',
            200
        );
    }

    public function indexProduccion()
    {
        $lotes = Lote::with('prendas_lote')->where('estado', 'produccion')->paginate(15);
        $resuorce = LoteResource::collection($lotes);

        return $this->successResponse(
            $resuorce,
            'Lotes obtenidos correctamente',
            200
        );
    }

    public function indexTerminados()
    {
        $lotes = Lote::with('prendas_lote')->where('estado', 'terminado')->paginate(15);
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
                'fecha_final' => $request->fecha_final
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

    /**
     * Update the specified resource in storage.
     */
    public function update(LoteRequest $request, string $id)
    {
        $lote = Lote::findOrFail($id);
        $lote->update($request->validated());

        $resource = new LoteResource($lote);
        return $this->successResponse(
            $resource,
            'Lote actualizado',
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
