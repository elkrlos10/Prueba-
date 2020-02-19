<?php

namespace App\Http\Controllers;

use App\Archivo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Dotenv\Validator;
use File;
use Illuminate\Support\Facades\Storage;

class ArchivoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('/archivo.edit',["archivo"=>Archivo::find($id)]);
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
        $entrada= $request->all();
        $archivo = Archivo::find($id);
        $archivo->update($entrada);
        return redirect('/home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $archivo = Archivo::find($id);
        $archivo->delete();

        $file_path = app_path($archivo->ruta); // app_path("public/test.txt");
        Storage::delete($archivo->ruta);

        return redirect('/home');
    }

    public function subirArchivo(Request $request)
    {
       
        $array_nombre= explode('.', $request->file('archivo')->getClientOriginalName());
        $request->file('archivo')->store('public');
        $file =$request->file('archivo');
        $peso = $file->getClientSize();        
        
        $ruta = $request->file('archivo')->store('public');

         Archivo::create([
            'nombre' => Auth::user()->nombres.' - '. Carbon::now()->format('d-m-Y').'.'.$array_nombre[1],
            'propietario' => Auth::user()->nombres,
            'peso' => (string)$peso,
            'fecha' => Carbon::now()->format('d-m-Y'),
            'ruta' =>$ruta,
        ]);

       return redirect("/home");
    }
}
