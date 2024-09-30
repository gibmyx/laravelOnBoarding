@extends('layouts.app') 

@section('tittle', 'Crear Persona')

@section('content')
    <div class="contenedor">
    <h2>Crear Profesor</h2>
    <form action="/Profesores/Crear" method="POST">
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
        <label for="">Titulo Universitario:</label>
        <input type="text" name="titulo_universitario" class="input-form">
        </div>
        <div>
        <label for="">Materia Asignada:</label>
        <input type="text" name="materia_asignada" class="input-form">
        </div>
        <div>
        <label for="">Horas Asignadas:</label>
        <input type="number" name="horas_asignadas" class="input-form">
        </div>
        <div>
        <input type="submit" class="boton boton-crear" value="Crear">
    </form>
</div>
@endsection