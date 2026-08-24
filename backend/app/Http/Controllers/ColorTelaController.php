<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ColorTela;
use App\Http\Requests\ColorTelaRequest;
use App\Http\Resources\ColorTelaResource;

class ColorTelaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexAll() {
        $coloresTela = ColorTela::with('tela')->get();
        $resource = ColorTelaResource::collection($coloresTela);

        return $this->successResponse(
            $resource,
            'Colores de tela obtenidos correctamente',
            200
        );
    }

    public function index()
    {
        $coloresTela = ColorTela::with('tela')->paginate(15);
        //$resuorce = ColorTelaResource::collection($coloresTela);

        return ColorTelaResource::collection($coloresTela)->additional([
            'success' => true,
            'message' => 'Colores de tela obtenidos correctamente'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ColorTelaRequest $request)
    {
        $colorTela = ColorTela::create($request->validated());
        $resource = new ColorTelaResource($colorTela);

        return $this->successResponse(
            $resource,
            'Color de tela creado correctamente',
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $colorTela = ColorTela::findOrFail($id);
        $resource = new ColorTelaResource($colorTela);

        return $this->successResponse(
            $resource,
            'Color de tela encontrado',
            200
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ColorTelaRequest $request, string $id)
    {
        $colorTela = ColorTela::findOrFail($id);
        $colorTela->update($request->validated());

        $resource = new ColorTelaResource($colorTela);
        return $this->successResponse(
            $resource,
            'Color de tela actualizada',
            200
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $colorTela = ColorTela::findOrFail($id);
        $colorTela->delete();

        return $this->successResponse(
            null,
            'Color de tela eliminado',
            200
        );
    }
}
