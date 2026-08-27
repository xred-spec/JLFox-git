<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Proceso;
use App\Models\PrendaProceso;
use App\Models\PrendaPieza;
use App\Http\Requests\ProcesoRequest;
use App\Http\Resources\ProcesoResource;

class ProcesoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexAll() {
        $procesos = Proceso::with('prendas_procesos.prenda.tipo_prenda', 'area')->get();
        $resource = ProcesoResource::collection($procesos);

        return $this->successResponse(
            $resource,
            'Procesos obtenidos correctamente',
            200
        );
    }

    public function index(Request $request)
    {
        $query = Proceso::with('prendas_procesos.prenda.tipo_prenda', 'area');

        if($request->filled('tipo_prenda_id')) {
            $query->whereHas('prendas_procesos.prenda', function ($q) use ($request) {
                $q->where('tipo_prenda_id', $request->tipo_prenda_id);
            });
        }

        if($request->filled('pieza_prenda_id')) {
            $query->whereHas('prendas_procesos', function ($q) use ($request) {
                $q->where('prenda_pieza_id', $request->pieza_prenda_id);
            });
        }

        $procesos = $query->paginate(15);

        return ProcesoResource::collection($procesos)->additional([
            'success' => true,
            'message' => 'Procesos obtenidos correctamente'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProcesoRequest $request)
    {
        $proceso = DB::transaction(function () use ($request) {
            $data = $request->validated();

            $newProceso = Proceso::create([
                'descripcion' => $data['descripcion'],
                'area_id' => $data['area_id']
            ]);

            $pieza = PrendaPieza::findOrFail($data['pieza_prenda_id']);
            $maxOrder = PrendaProceso::where('prenda_pieza_id', $pieza->id)->max('orden');
            $order = $maxOrder ? $maxOrder + 1 : 1;

            $newPrendaProceso = PrendaProceso::create([
                'clave' => $data['clave'],
                'prenda_pieza_id' => $pieza->id,
                'proceso_id' => $newProceso->id,
                'orden' => $order,
                'tiempo_previsto_hora' => $data['tiempo_previsto_hora'],
                'tiempo_previsto_minuto' => $data['tiempo_previsto_minuto'],
                'tiempo_previsto_segundo' => $data['tiempo_previsto_segundo'],
            ]);

            return $newProceso;
        });

        $resource = ProcesoResource::make($proceso);

        return $this->successResponse(
            $resource,
            'Proceso creado y asignado correctamente',
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
    public function update(ProcesoRequest $request, $id)
    {
        $proceso = DB::transaction(function () use ($request, $id) {
            $data = $request->validated();

            $proceso = Proceso::findOrFail($id);
            $proceso->update([
                'descripcion' => $data['descripcion'],
                'area_id' => $data['area_id']
            ]);

            $prendaProceso = $proceso->prendas_procesos()->first();

            if ($prendaProceso) {
                if ($prendaProceso->prenda_pieza_id != $data['pieza_prenda_id']) {
                    $pieza = PrendaPieza::findOrFail($data['pieza_prenda_id']);
                    $maxOrder = PrendaProceso::where('prenda_pieza_id', $pieza->id)->max('orden');
                    $prendaProceso->orden = $maxOrder ? $maxOrder + 1 : 1;
                }

                $prendaProceso->update([
                    'clave' => $data['clave'],
                    'prenda_pieza_id' => $data['pieza_prenda_id'], 
                    'tiempo_previsto_hora' => $data['tiempo_previsto_hora'],
                    'tiempo_previsto_minuto' => $data['tiempo_previsto_minuto'],
                    'tiempo_previsto_segundo' => $data['tiempo_previsto_segundo'],
                ]);
            }

            $proceso->load('prendas_procesos.prenda.tipo_prenda');

            return $proceso;
        });

        $resource = ProcesoResource::make($proceso);

        return $this->successResponse(
            $resource,
            'Proceso actualizado correctamente',
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
