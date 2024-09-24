<x-app-layout>
    <style>
        div{
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid black;
            margin: 10px;
            padding: 20px;
            background-color: white;
        }

        .mostrar{
            display: grid;
            width: 500px;
            border: 1px solid black;
            margin: 10px;
            padding: 20px;
            text-align: center;
            background-color: white;
        }
    </style>

    <a href="/people">Home Page</a>

    <x-alert type="success" class="mt-6">
        <x-slot name="title">
            LA ACCION SE HA REALIZADO CON EXITO
        </x-slot>
    </x-alert>

    <div class="mostrar">
        <h1>{{ $person->name }} {{ $person->surname }}</h1>
        <h2>{{ $person->email }}</h2>
        <h2>{{ $person->description }}</h2>
    </div>
</x-app-layout>
