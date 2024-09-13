@extends('layouts.app') 

@section('tittle', 'Crear Persona')

@section('content')
    <div class="contenedor">
    <h2>Modificar Persona</h2>
    <form action="/modificar/{{$persona->id}}" method="POST">
        @csrf
        @method('PUT')
        <div>
        <label for="">
            Nombre:
            <input type="text" name="nombre" value="{{$persona->nombre}}" class="input-form">
        </label>
        </div>
        <div>
        <label for="">
            Apellido:
            <input type="text" name="apellido" value="{{$persona->apellido}}" class="input-form">
        </label>
        </div>
        <div>
        <label for="">
            Email:
            <input type="text" name="email" value="{{$persona->email}}" class="input-form">
        </label>
        </div>
        <div>
        <label for="">
            Descripcion:
            <input type="text" name="descripcion" value="{{$persona->descripcion}}" class="input-form">
        </label>
        </div>
        <input type="submit" value="Modificar" class="boton boton-crear">
    </form>
    </div>
@endsection