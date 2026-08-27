<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PrendaPieza;
use App\Http\Requests\PrendaPiezaRequest;
use App\Http\Resources\PrendaPiezaResource;

class PrendaPiezaController extends Controller
{
    public function indexAll() {
        $piezasPrendas = PrendaPieza::with('tipo_prenda')->get();
        $resource = PrendaPiezaResource::collection($piezasPrendas);

        return $this->successResponse(
            $resource,
            'Piezas de prendas obtenidas correctamente',
            200
        );
    }

    public function index(Request $request)
    {
        $query = PrendaPieza::with('tipo_prenda', 'procesos');
        /*
        $resource = PrendaPiezaResource::collection($piezasPrendas);

        return $this->successResponse(
            $resource,
            'Piezas de prendas obtenidas correctamente',
            200
        );
        */
        if($request->filled('tipo_prenda_id')) {
            $query->where('tipo_prenda_id', $request->tipo_prenda_id);
        }

        $piezasPrendas = $query->paginate(15);

        return PrendaPiezaResource::collection($piezasPrendas)->additional([
            'success' => true,
            'message' => 'Piezas de prendas obtenidos correctamente'
        ]);
    }

    public function store(PrendaPiezaRequest $request)
    {
        $piezasPrendas = PrendaPieza::create($request->validated());
        $resource = PrendaPiezaResource::make($piezasPrendas);

        return $this->successResponse(
            $resource,
            'Pieza de prenda creada correctamente',
            201
        );
    }

    public function show(string $id)
    {
        $piezasPrendas = PrendaPieza::findOrFail($id);
        $resource = new PrendaPiezaResource($piezasPrendas);

        return $this->successResponse(
            $resource,
            'Pieza de prenda encontrada',
            200
        );
    }

    public function update(PrendaPiezaRequest $request, string $id)
    {
        $piezasPrendas = PrendaPieza::findOrFail($id);
        $piezasPrendas->update($request->validated());

        $resource = new PrendaPiezaResource($piezasPrendas);
        return $this->successResponse(
            $resource,
            'Pieza de prenda actualizada',
            200
        );
    }

    public function destroy(string $id)
    {
        $piezasPrendas = PrendaPieza::findOrFail($id);
        $piezasPrendas->delete();

        return $this->successResponse(
            null,
            'Pieza de prenda eliminada',
            200
        );
    }
}
