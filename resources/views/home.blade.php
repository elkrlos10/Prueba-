@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div>
                <form method="POST" action="{{route('subir')}}" accept-charset="UTF-8" enctype="multipart/form-data">
                    @csrf

                    <label for="archivo"><b>Archivo: </b></label><br>
                    <input type="file" name="archivo" required   data-max-size="100">
                    <input class="btn btn-success" type="submit" value="Enviar" >
                  </form>
    
                  <br>
                  <br>  
            </div>
           

            <div class="col-md-12">
     
                <table class="table">
                    <thead  class="thead-dark">
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Propietario</th>
                        <th scope="col">Peso</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Acciones</th>
                        <th scope="col">+</th>
                      </tr>
                    </thead>
                    <tbody>
                     @foreach ($archivos as $archivo)
                      <tr>
                        <th scope="row">{{$archivo->id}}</th>
                        <td>{{$archivo->nombre}}</td>
                        <td>{{$archivo->propietario}}</td>
                        <td>{{$archivo->peso}}</td>
                        <td>{{$archivo->fecha}}</td>
                        <td>{{$archivo->acciones}}</td>
                        <td>
                            <form action="{{ route('archivo.destroy',$archivo->id) }}" method="POST">
                                <a href="{{route('archivo.edit', $archivo->id)}}"><button type="button" class="btn btn- btn-outline-primary btn-sm">Editar</button></a>
                                
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger btn-sm">Eliminar</button>
                            </form>
                        </td>
                      </tr>
                    @endforeach     
                    </tbody>
                  </table>  
              
            </div>
        </div>
    </div>
</div>
@endsection
