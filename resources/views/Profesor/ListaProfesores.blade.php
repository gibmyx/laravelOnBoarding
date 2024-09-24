@extends('layouts.app') 

@section('tittle', 'Hola')

@push('css')

@endpush

@section('content')

<div class="contenedor">
<h2>Lista de Profesores</h2>
<a href="/Profesores/Crear" class="boton boton-crear">Crear</a>
<table>
    <thead>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Cedula</th>
        <th>Edad</th>
        <th>Genero</th>
        <th>Titulo</th>
        <th>Materia</th>
        <th>Horas asignadas</th>
        <th>Accion</th>
    </thead>
    <tbody>
        @foreach ($profesor as $p)
        <tr>
            <td>{{$p->nombre}}</td>
            <td>{{$p->apellido}}</td>
            <td>{{$p->cedula}}</td>
            <td>{{$p->edad}}</td>
            <td>{{$p->genero}}</td>
            <td>{{$p->titulo_universitario}}</td>
            <td>{{$p->materia_asignada}}</td>
            <td>{{$p->horas_asignadas}}</td>
            <td> <div><form action="/Profesores/Eliminar/{{$p->cedula}}" method="post">
            @csrf
            @method('DELETE')
            <input type="submit" value="Eliminar" class="boton boton-borrar">
            </form>
            
                <a href="/Profesores/Modificar/{{$p->cedula}}" class="boton boton-modificar">Modificar</a>
            </div>
            </td>
        </tr>
        @endforeach
</tbody>
</table>
</div>
@endsection
