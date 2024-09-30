@extends('layouts.app') 

@section('tittle', 'Hola')

@push('css')

@endpush

@section('content')

<div class="contenedor">
<h2>Lista de personas</h2>
<a href="/crear" class="boton boton-crear">Crear</a>
<table>
    <thead>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Correo</th>
        <th>Descripcion</th>
        <th>Accion</th>
    </thead>
    <tbody>
        @foreach ($persona as $p)
        <tr>
            <td>{{$p->nombre}}</td>
            <td>{{$p->apellido}}</td>
            <td>{{$p->email}}</td>
            <td>{{$p->descripcion}}</td>
            <td> <div><form action="/eliminar/{{$p->id}}" method="post">
            @csrf
            @method('DELETE')
            <input type="submit" value="Eliminar" class="boton boton-borrar">
            </form>
            
                <a href="/modificar/{{$p->id}}" class="boton boton-modificar">Modificar</a>
            </div>
            </td>
        </tr>
        @endforeach
</tbody>
</table>
</div>
@endsection