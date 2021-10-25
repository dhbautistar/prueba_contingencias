<!DOCTYPE html>
@extends('layouts.app')

@section('content')
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>estudiantes</title>
</head>
<body>
    <div class="container">
    <h1>Estudiantes</h1>
    <form action="">
      <div class="row">
        <div class="col-6">
          <input class="form-control" type="text" name="filtro"  placeholder="Buscar por: Nombre, Apellidos, Email, telefono, contactado, programa">
        </div>
        <div class="col-3">
          <select class="form-control" name="contactado">
            <option value="">Seleccione Contactado...</option>
            <option value="1">Si</option>
            <option value="2">No</option>
          </select>
        </div>
        <div class="col-3">
          <button type="submit" class="btn btn-info col-5" >Buscar</button>
        </div>
      </div>
    </form>
      <table class="table table-dark">
      <thead>
        <tr>
          <th scope="col">Nombres</th>
          <th scope="col">Apellidos</th>
          <th scope="col">Email</th>
          <th scope="col">Telefono</th>
          <th scope="col">Contactado</th>
          <th scope="col">Programa</th>
          <th scope="col">funciones</th>
        </tr>
      </thead>
      <tbody>
      @foreach ($estudiantes as $estudiante)
        <tr>
          <td>{{$estudiante->nombres}}</td>
          <td>{{$estudiante->apellidos}}</td>
          <td>{{$estudiante->email}}</td>
          <td>{{$estudiante->telefono}}</td>
          @if($estudiante->contactado == 2)
            <td>No</td>
          @elseif($estudiante->contactado == 1)
            <td>Si</td>
          @endif
          <td>{{$estudiante->programas->nombre}}</td>
          <td>
            <a class="btn btn-warning" href="{{route('estudiantes.edit', $estudiante->id)}}">Editar</a>
            <form action="{{route('estudiantes.destroy',$estudiante->id)}}" method="POST">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger" >Eliminar</button>
            </form>
          </td>
        </tr>
      @endforeach  
      </tbody>
    </table>
{{ $estudiantes->links() }}
</div>
</body>
@endsection
</html>