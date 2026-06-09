<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bordado;
use App\Http\Requests\BordadoRequest;
use App\Http\Resources\BordadoResource;

class BordadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bordados = Bordado::with('color_hilo')->paginate(15);
        $resuorce = BordadoResource::collection($bordados);

        return $this->successResponse(
            $resuorce,
            'Bordados obtenidos correctamente',
            200
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BordadoRequest $request)
    {
        $bordado = Bordado::create($request->validated());
        $resource = new BordadoResource($bordado);

        return $this->successResponse(
            $resource,
            'Bordado creado correctamente',
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $bordado = Bordado::findOrFail($id)->with('color_hilo');
        $resource = new BordadoResource($bordado);

        return $this->successResponse(
            $resource,
            'Bordado encontrado',
            200
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BordadoRequest $request, string $id)
    {
        $bordado = Bordado::findOrFail($id);
        $bordado->update($request->validated());

        $resource = new BordadoResource($bordado);
        return $this->successResponse(
            $resource,
            'Bordado actualizado',
            200
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $bordado = Bordado::findOrFail($id);
        $bordado->delete();

        return $this->successResponse(
            null,
            'Bordado eliminado',
            200
        );
    }
}
