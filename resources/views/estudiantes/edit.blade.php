<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>editar estudiante</title>
</head>
<body>
    <form action="{{route('estudiantes.update', $estudiante)}}" method="post">
        @csrf
        @method('PUT')
        <label for="nombres">Nombres</label>
        <input type="text" name="nombres" value="{{$estudiante->nombres}}" placeholder="Ingresar nombres">

        <label for="apellidos">Apellidos</label>
        <input type="text" name="apellidos" value="{{$estudiante->apellidos}}" placeholder="Ingresar apellidos">

        <label for="email">Email</label>
        <input type="email" name="email" value="{{$estudiante->email}}" placeholder="email">

        <label for="telefono">Telefono</label>
        <input type="text" name="telefono" value="{{$estudiante->telefono}}" placeholder="Ingresar telefono">

        <label for="programa_id">Programa</label>
        <select name="programa_id">
            @foreach ($programas as $programa)
            @if ($programa->id == $estudiante->programa_id)
            <option value="{{$estudiante->programa_id}}" selected >{{$programa->nombre}}</option>
            @else
            <option value="{{$programa->id}}"  >{{$programa->nombre}}</option>
            @endif
            @endforeach
        </select>        
        <label for="contactado">Estudiante Contactado</label>
        <select name="contactado">
        <option value="0" selected>NO</option>
            <option value="1">SI</option>
        </select>

        <button type="submit" class="btn btn-primary">Editar</button>
    </form>
</body>
</html>