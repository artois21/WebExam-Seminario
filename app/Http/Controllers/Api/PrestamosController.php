<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PrestamoRequest;
use App\Models\Prestamos;
use App\Models\User;
use Illuminate\Http\Request;

class PrestamosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Prestamos::get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PrestamoRequest $request)
    {
        //
        return response()->json(Prestamos::create($request->validated()));
    }

    /**
     * Display the specified resource.
     */
    public function show($user)
    {
        //
        // Encuentra el usuario por su ID
        $prestamo = Prestamos::where('user_id', $user)->first();
        
        if (!$prestamo) {
            return response()->json(['message' => 'No se encontró ningún préstamo para el user_id especificado'], 404);
        }
    
        return response()->json($prestamo);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PrestamoRequest $request, Prestamos $prestamos)
    {
        //
        $prestamos->update($request->validated());
        return response()->json($prestamos);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Prestamos $prestamos)
    {
        //
        $prestamos->delete();
        return response()->json("ok");
    }
}
