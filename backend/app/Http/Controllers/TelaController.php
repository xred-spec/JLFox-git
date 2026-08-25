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
    public function indexAll() {
        $telas = Tela::all();
        $resource = TelaResource::collection($telas);

        return $this->successResponse(
            $resource,
            'Telas obtenidas correctamente',
            200
        );
    }

    public function index()
    {
        $telas = Tela::paginate(15);
        /*
        $resuorce = TelaResource::collection($telas);

        return $this->successResponse(
            $resuorce,
            'Telas obtenidas correctamente',
            200
        );
        */

        return TelaResource::collection($telas)->additional([
            'success' => true,
            'message' => 'Tipos de tela obtenidos correctamente'
        ]);
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
            'Tela creada correctamente',
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
