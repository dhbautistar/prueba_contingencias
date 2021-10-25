<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>estudiantes</title>
</head>
<body>
    <h1>estudiantes</h1>
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
      <td>{{$estudiante->contactado}}</td>
      <td>{{$estudiante->programas->nombre}}</td>
      <td><a href="{{route('estudiantes.edit', $estudiante->id)}}">Editar</a>
      <form action="{{route('estudiantes.destroy',$estudiante->id)}}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Eliminar</button></td>
      </form>
    </tr>
  @endforeach  
  </tbody>
</table>
{{ $estudiantes->links() }}
</body>
</html>