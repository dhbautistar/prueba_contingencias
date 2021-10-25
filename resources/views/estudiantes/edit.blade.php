<!DOCTYPE html>
@extends('layouts.app')

@section('content')
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>editar estudiante</title>
</head>
<body>
<div class="container">
    <form action="{{route('estudiantes.update', $estudiante)}}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nombres">Nombres</label>
            <input class="form-control" type="text" name="nombres" value="{{$estudiante->nombres}}" placeholder="Ingresar nombres">
        </div>

        <div class="form-group">
            <label for="apellidos">Apellidos</label>
            <input class="form-control" type="text" name="apellidos" value="{{$estudiante->apellidos}}" placeholder="Ingresar apellidos">
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input class="form-control" type="email" name="email" value="{{$estudiante->email}}" placeholder="email">
        </div>
        
        <div class="form-group">
            <label for="telefono">Telefono</label>
            <input class="form-control" type="text" name="telefono" value="{{$estudiante->telefono}}" placeholder="Ingresar telefono">
        </div>

        <div class="form-group">
            <label for="programa_id">Programa</label>
            <select class="form-control"  name="programa_id">
                @foreach ($programas as $programa)
                @if ($programa->id == $estudiante->programa_id)
                <option value="{{$estudiante->programa_id}}" selected >{{$programa->nombre}}</option>
                @else
                <option value="{{$programa->id}}"  >{{$programa->nombre}}</option>
                @endif
                @endforeach
            </select>        
        </div>

        <div class="form-group">
            <label for="contactado">Estudiante Contactado</label>
            <select class="form-control" name="contactado">
            <option value="2" selected>NO</option>
                <option value="1">SI</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Editar</button>
    </form>
</DIV>
</body>
@endsection
</html> 