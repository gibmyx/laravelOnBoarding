@extends('layouts.app') 

@section('tittle', 'Crear Persona')

@section('content')
    <div class="contenedor">
    <h2>Crear Persona</h2>
    <form action="/crear" method="POST">
        @csrf
        <div>
        <label for="">Nombre: </label>
        <input type="text" name="nombre" class="input-form">
        </div>
        <div>
        <label for="">
            Apellido:
        </label>
        <input type="text" name="apellido" class="input-form">
        </div>
        <div>
        <label for="">
            Email:
        </label>
        <input type="text" name="email" class="input-form">
        </div>
        <div>
        <label for="">
            Descripcion:
        </label>
        <input type="text" name="descripcion" class="input-form">

        </div>
        <input type="submit" class="boton boton-crear" value="Crear">
    </form>
</div>
@endsection