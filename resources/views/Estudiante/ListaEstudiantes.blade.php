@extends('layouts.app') 

@section('tittle', 'Hola')

@push('css')

@endpush

@section('content')

<div class="contenedor">
<h2>Lista de Estudiantes</h2>
<a href="/Estudiantes/Crear" class="boton boton-crear">Crear</a>
<table>
    <thead>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Cedula</th>
        <th>Edad</th>
        <th>Genero</th>
        <th>Grado</th>
        <th>Cantidad de materia</th>
        <th>Nota</th>
        <th>Accion</th>
    </thead>
    <tbody>
        @foreach ($estudiante as $e)
        <tr>
            <td>{{$e->nombre}}</td>
            <td>{{$e->apellido}}</td>
            <td>{{$e->cedula}}</td>
            <td>{{$e->edad}}</td>
            <td>{{$e->genero}}</td>
            <td>{{$e->grado}}</td>
            <td>{{$e->cantidad_materia}}</td>
            <td>{{$e->nota}}</td>
            <td> <div><form action="/Estudiantes/Eliminar/{{$e->cedula}}" method="post">
            @csrf
            @method('DELETE')
            <input type="submit" value="Eliminar" class="boton boton-borrar">
            </form>
            
                <a href="/Estudiantes/Modificar/{{$e->cedula}}" class="boton boton-modificar">Modificar</a>
            </div>
            </td>
        </tr>
        @endforeach
</tbody>
</table>
</div>
@endsection
