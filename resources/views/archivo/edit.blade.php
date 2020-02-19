@extends('layouts.app')

@section('content')
<div class="container align-content-center">
    <div class="row">
        <div class="col-md-8">
            <form action="{{route('archivo.update', $archivo->id)}}" method="POST">
                @method("PATCH")
                @csrf
                <input type="hidden" name="ruta" value="{{$archivo->ruta}}">
                <input type="hidden" name="fecha" value="{{$archivo->fecha}}">
                <div class="form-group">
                    <label for="exampleInputEmail1">Nombre Archivo</label>
                    <input type="text" class="form-control form-control-sm" name="nombre"  value="{{$archivo->nombre}}" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Propietario </label>
                    <input type="text" class="form-control form-control-sm" name="propietario"  value="{{$archivo->propietario}}" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Peso</label>
                    <input type="text" class="form-control form-control-sm" name="peso"  value="{{$archivo->peso}}">
                </div>
                <button type="submit" class="btn btn-primary form-control-sm">Submit</button>
            </form>   
       </div> 
   </div>
</div>
@endsection