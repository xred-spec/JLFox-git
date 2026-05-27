<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tela;
use App\Http\Requests\TelaRequest;
use App\Http\Resources\TelaResource;

class TelaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $telas = Tela::paginate(15);
        $resuorce = TelaResource::collection($telas);

        return $this->successResponse(
            $resuorce,
            'Telas obtenidos correctamente',
            200
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TelaRequest $request)
    {
        $tela = Tela::create($request->validated());
        $resource = new TelaResource($tela);

        return $this->successResponse(
            $resource,
            'Tela creado correctamente',
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $tela = Tela::findOrFail($id);
        $resource = new TelaResource($tela);

        return $this->successResponse(
            $resource,
            'Tela encontrada',
            200
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TelaRequest $request, string $id)
    {
        $tela = Tela::findOrFail($id);
        $tela->update($request->validated());

        $resource = new TelaResource($tela);
        return $this->successResponse(
            $resource,
            'Tela actualizada',
            200
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tela = Tela::findOrFail($id);
        $tela->delete();

        return $this->successResponse(
            null,
            'Tela eliminada',
            200
        );
    }
}
