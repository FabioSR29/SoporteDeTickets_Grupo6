<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ticket;

class ticketController extends Controller
{
    public function index()
{
    $tickets = Ticket::all();
    return response()->json($tickets);
}


    public function store(Request $request)
{
    try {
        $request->validate([
            'titulo' => 'required',
            'descripcion' => 'required',
            'archivo_adjunto' => 'nullable|file|max:2048'
        ]);

        $ticket = new Ticket();
        $ticket->titulo = $request->input('titulo');
        $ticket->descripcion = $request->input('descripcion');

      
        if ($request->hasFile('archivo_adjunto')) {
            $archivoAdjunto = $request->file('archivo_adjunto');
            $contenidoArchivo = file_get_contents($archivoAdjunto);
            $ticket->archivo_adjunto = $contenidoArchivo;
        }

        $ticket->save();

        return response()->json(['message' => 'Ticket creado exitosamente'], 201);
    } catch (\Exception $e) {
        return response()->json(['Error al ingresar datos: ' => $e->getMessage()], 500);
    }
}

//     public function store(Request $request)
// {
//     $request->validate([
//         'titulo' => 'required',
//         'descripcion' => 'required',
//         'archivo_adjunto' => 'nullable|file|max:2048' // Tamaño máximo de archivo de 2MB
//     ]);

//     $ticket = new ticket();
//     $ticket->titulo = $request->input('titulo');
//     $ticket->descripcion = $request->input('descripcion');

  
//     if ($request->hasFile('archivo_adjunto')) {
//         $archivoAdjunto = $request->file('archivo_adjunto');
//         $contenidoArchivo = file_get_contents($archivoAdjunto);
//         $ticket->archivo_adjunto = $contenidoArchivo;
//     }

//     $ticket->save();

//     return response()->json(['message' => 'Ticket creado exitosamente'], 201);
// }

}
