@extends('layouts.app') 

@section('tittle', 'Crear Persona')

@section('content')
    <div class="contenedor">
    <h2>Modificar Profesor</h2>
    <form action="/Profesores/Modificar/{{$profesor->cedula}}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="">Nombre: </label>
            <input type="text" name="nombre" class="input-form" value="{{$profesor->nombre}}">
            </div>
            <div>
            <label for="">Apellido:</label>
            <input type="text" name="apellido" class="input-form" value="{{$profesor->apellido}}">
            </div>
            <div>
            <label for="">Cedula:</label>
            <input type="number" name="cedula" class="input-form" value="{{$profesor->cedula}}">
            </div>
            <div>
            <label for="">Edad:</label>
            <input type="number" name="edad" class="input-form" value="{{$profesor->edad}}">
            </div>
            <div>
            <label for="">Genero:</label>
            <input type="text" name="genero" class="input-form" value="{{$profesor->genero}}">
            </div>
            <div>
            <label for="">Titulo Universitario:</label>
            <input type="text" name="titulo_universitario" class="input-form" value="{{$profesor->titulo_universitario}}">
            </div>
            <div>
            <label for="">Materia asignada:</label>
            <input type="text" name="materia_asignada" class="input-form" value="{{$profesor->materia_asignada}}">
            </div>
            <div>
            <label for="">Horas Asignadas:</label>
            <input type="number" name="horas_asignadas" class="input-form" value="{{$profesor->horas_asignadas}}">
            </div>
            <div>
            <input type="submit" class="boton boton-crear" value="Modificar">
    </form>
    </div>
@endsection