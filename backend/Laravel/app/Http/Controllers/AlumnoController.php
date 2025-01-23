<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return DB::table('alumno')->get();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function store(Request $request)
    {

        $datosValidados = $request->validate([
            'nombre' => 'required|string|max:32',
            'telefono' => 'nullable|string|max:16',
            'edad' => 'nullable|integer',
            'password' => 'required|string|min:6',
            'email' => 'required|email|unique:alumno,email',
            'sexo' => 'nullable|string|max:10'
        ]);

        DB::table('alumno')->insert([
            'nombre' => $datosValidados['nombre'],
            'telefono' => $datosValidados['telefono'] ?? null,
            'edad' => $datosValidados['edad'] ?? null,
            'password' => $datosValidados['password'],
            'email' => $datosValidados['email'],
            'sexo' => $datosValidados['sexo'] ?? null,
        ]);


        return response()->json(["MENSAJE" => "ALUMNO CREADO CON EXITO"], 201);
    }
    /**
     * Display the specified resource.
     */
    public function show(Request $request, $id)
    {
        return DB::table('alumno')->find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //VALIDAR
        $datosValidados = $request->validate(rules: [
            'nombre' => 'required|string|max:32',
            'telefono' => 'nullable|string|max:16',
            'edad' => 'nullable|integer',
            'password' => 'required|string|min:6',
            'email' => 'required|email|unique:alumno,email',
            'sexo' => 'nullable|string|max:10'
        ]);
        //BUSCAR
        $alumno = DB::table('alumno')->where('id', $id);

        if (!$alumno->exists()) {
            return response()->json(['MENSAJE' => 'ALUMNO NO ENCONTRADO'], 404);
        }

        //ACTUALIZAR
        DB::table('alumno')->where('id', $id)->update($datosValidados);

        return response()->json(['MENSAJE' => 'ALUMNO ACTUALIZADO CON EXITO']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        DB::table('alumno')->where('id', $id)->delete();
        return response()->json(['MENSAJE' => 'ALUMNO ELIMINADO CON EXITO']);
    }
}
