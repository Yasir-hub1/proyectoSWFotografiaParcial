<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evento;
use App\Models\Album;
use App\Models\Foto;
use App\Models\Fotografo;
use Illuminate\Support\Facades\Auth;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $eventos = Evento::all();
        return view('eventos.index', compact('eventos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('eventos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'ubicacion' => 'required',
            'fecha' => 'required',
            'hora' => 'required',
        ]);
        $evento  = new Evento();
        $evento->nombre = $request->nombre;
        $evento->descripcion = $request->descripcion;
        $evento->ubicacion = $request->ubicacion;
        $evento->fecha = $request->fecha;
        $evento->hora = $request->hora;
        $evento->precio = $request->precio;
        $evento->estado = $request->estado;
        $evento->user_id = Auth::user()->id;
        $evento->save();

        $imagen = Str::slug($evento->nombre).'.png';
        $filename = storage_path(). '\app\public\codesqr/' .$imagen;
        //$name = substr($filename, 43);
        $name = substr($filename, 63);
        QrCode::generate($evento, $filename);
        QrCode::size(500)
        ->backgroundColor(255,255,204)
        ->generate($evento, $filename);
        
        $url = Storage::url($name);
        $evento->code_qr = $url;
        $evento->save();

        /*Album::create([
            'evento_id' => $evento->id,
        ]);*/
        return redirect()->route('eventos.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $evento = Evento::find($id);
        return view('eventos.mostrarFotos', compact('eventos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $eventos = Evento::findOrFail($id);
        return view('eventos.edit',compact('eventos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $eventos = Evento::findOrFail($id);
        $datos = $request->all();
        $eventos->update($datos);
        
        return redirect('/eventos')->route('eventos.index')->with('mensaje','Datos actualizados correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Evento::find($id)->delete();
        return redirect()->route('eventos.index');
    }

    public function generarCatalogo(){

        $fotografos = Fotografo::all();
        return view('eventos.generarCatalogo');
    }
}
