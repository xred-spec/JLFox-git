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
    public function index()
    {
        $procesos = Proceso::paginate(15);
        $resource = ProcesoResource::collection($procesos);

        return $this->successResponse(
            $resource,
            'Procesos obtenidos correctamente',
            200
        );
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
                'area' => $data['area']
            ]);

            $pieza = PrendaPieza::findOrFail($data['pieza_prenda_id']);
            $order = $pieza->procesos()->count() + 1;

            $newPrendaProceso = PrendaProceso::create([
                'prenda_pieza_id' => $pieza->id,
                'proceso_id' => $newProceso->id,
                'orden' => $order
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
    public function update(ProcesoRequest $request, string $id)
    {
        $proceso = Proceso::findOrFail($id);
        $proceso->update($request->validated());

        $resource = new ProcesoResource($proceso);
        return $this->successResponse(
            $resource,
            'Proceso actualizado',
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
