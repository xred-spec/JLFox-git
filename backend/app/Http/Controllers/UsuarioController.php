<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Http\Requests\UsuarioRequest;
use App\Http\Requests\UpdateUsuarioRequest;
use App\Http\Resources\UsuarioResource;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarios = Usuario->paginate(15);
        $resource = UsuarioResource::collection($usuarios);

        return $this->succesResponse(
            $resource,
            'Usuarios obtenidos correctamente',
            200
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UsuarioRequest $request)
    {
        $usuario = $request->validated();
        Usuario::create($usuario);
        $resource = new UsuarioResource($usuario);

        return $this->successResponse(
            $resource,
            'Usuario creado correctamente',
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $usuario = Usuario::findOrFail($id);
        $resource = new UsuarioResource($usuario);

        return $this->successResponse(
            $usuario,
            'Usuario encontrado',
            200
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUsuarioRequest $request, string $id)
    {
        $usuario = Usuario::findOrFail($id);
        $usuario->update($request->validated());

        $resource = new UsuarioResource($usuario);
        return $this->successResponse(
            $resource,
            'Usuario actualizado',
            200
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $usuario = Usuario::findOrFail($id);
        $usuario->delete();

        return $this->successResponse(
            null,
            'Usuario eliminado',
            204
        );
    }
}
