<?php

namespace App\Http\Controllers;

use App\Http\Requests\PrestamoRequest;
use App\Models\Prestamos;
use App\Models\User;
use Illuminate\Http\Request;

class PrestamoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $userId = auth()->user()->id;
        $usuario = User::find($userId);
        //validar si usuario tiene prestamo
        $prestamo = Prestamos::where('user_id', $userId)->first();
        $bandera = false;
        $total = 0;
        $cuota = 0;
        $interes=0;
        if (!$prestamo) {
            $bandera = true;
        }else{
            $total=($prestamo->cantidad)+($prestamo->interes)*($prestamo->cantidad)/100;
            $cuota = $total/$prestamo->periodo;
            $interes = ($total-$prestamo->cantidad)/$prestamo->periodo;
        }
        return view('prestamo.index', compact('usuario','bandera','prestamo','total','cuota','interes'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        //buscamos las categorias para enviarlas a la vsita  
        $prestamo = new Prestamos();
        //regresamos una vista
        echo view('prestamo.create', compact('prestamo'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PrestamoRequest $request)
    {
        //
        $userId = auth()->user()->id;
        $data = $request->all(); // Obtén los datos del formulario
        // Agrega el campo id_user al arreglo de datos
        $data['user_id'] = $userId;
        // Crea el registro en la tabla Prestamos con el campo id_user
        Prestamos::create($data);
        return redirect("/dashboard/prestamo")->with('status',"Registro Creado");
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
        return view('prestamo.show', compact('prestamo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Prestamos $prestamos)
    {
        //
        echo view('prestamo.edit', compact('prestamos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PrestamoRequest $request, Prestamos $prestamo)
    {        //
        $prestamo->update($request->all());
        //enviar a ruta index con un mensaje tipo flash para usarlo en el layout
        return redirect("/dashboard/prestamo")->with('status',"Registro actualizado");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Prestamos $prestamos)
    {
        //
    }
}
