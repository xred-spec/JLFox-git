<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Forro;
use App\Http\Requests\ForroRequest;
use App\Http\Resources\ForroResource;

class ForroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $forros = Forro::paginate(15);
        $resuorce = ForroResource::collection($forros);

        return $this->successResponse(
            $resuorce,
            'Forros obtenidos correctamente',
            200
        );
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(ForroRequest $request)
    {
    
        $forro = Forro::create($request->validated());
        $resource = new ForroResource($forro);

        return $this->successResponse(
            $resource,
            'Forro creado correctamente',
            201
        );
        
        //return response('nigga wtf')->json();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $forro = Forro::findOrFail($id);
        $resource = new ForroResource($forro);

        return $this->successResponse(
            $resource,
            'Forro encontrado',
            200
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ForroRequest $request, string $id)
    {
        $forro = Forro::findOrFail($id);
        $forro->update($request->validated());

        $resource = new ForroResource($forro);
        return $this->successResponse(
            $resource,
            'Forro actualizado',
            200
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $forro = Forro::findOrFail($id);
        $forro->delete();

        return $this->successResponse(
            null,
            'Forro eliminado',
            200
        );
    }
}
