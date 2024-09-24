@extends('layouts.app') 

@section('tittle', 'Crear Persona')

@section('content')
    <div class="contenedor">
    <h2>Modificar Estudiante</h2>
    <form action="/Estudiantes/Modificar/{{$estudiante->cedula}}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="">Nombre: </label>
            <input type="text" name="nombre" class="input-form" value="{{$estudiante->nombre}}">
            </div>
            <div>
            <label for="">Apellido:</label>
            <input type="text" name="apellido" class="input-form" value="{{$estudiante->apellido}}">
            </div>
            <div>
            <label for="">Cedula:</label>
            <input type="number" name="cedula" class="input-form" value="{{$estudiante->cedula}}">
            </div>
            <div>
            <label for="">Edad:</label>
            <input type="number" name="edad" class="input-form" value="{{$estudiante->edad}}">
            </div>
            <div>
            <label for="">Genero:</label>
            <input type="text" name="genero" class="input-form" value="{{$estudiante->genero}}">
            </div>
            <div>
            <label for="">Grado:</label>
            <input type="text" name="grado" class="input-form" value="{{$estudiante->grado}}">
            </div>
            <div>
            <label for="">Cantidad de materia:</label>
            <input type="number" name="cantidad_materia" class="input-form" value="{{$estudiante->cantidad_materia}}">
            </div>
            <div>
            <label for="">Nota:</label>
            <input type="number" name="nota" class="input-form" value="{{$estudiante->nota}}">
            </div>
            <div>
            <input type="submit" class="boton boton-crear" value="Modificar">
    </form>
    </div>
@endsection