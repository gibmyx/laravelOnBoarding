@extends('layouts.app') 

@section('tittle', 'Crear Persona')

@section('content')
    <div class="contenedor">
    <h2>Crear Estudiante</h2>
    <form action="/Estudiantes/Crear" method="POST">
        @csrf
        <div>
        <label for="">Nombre: </label>
        <input type="text" name="nombre" class="input-form">
        </div>
        <div>
        <label for="">Apellido:</label>
        <input type="text" name="apellido" class="input-form">
        </div>
        <div>
        <label for="">Cedula:</label>
        <input type="number" name="cedula" class="input-form">
        </div>
        <div>
        <label for="">Edad:</label>
        <input type="number" name="edad" class="input-form">
        </div>
        <div>
        <label for="">Genero:</label>
        <input type="text" name="genero" class="input-form">
        </div>
        <div>
        <label for="">Grado:</label>
        <input type="text" name="grado" class="input-form">
        </div>
        <div>
        <label for="">Cantidad de materia:</label>
        <input type="number" name="cantidad_materia" class="input-form">
        </div>
        <div>
        <label for="">Nota:</label>
        <input type="number" name="nota" class="input-form">
        </div>
        <div>
        <input type="submit" class="boton boton-crear" value="Crear">
    </form>
</div>
@endsection