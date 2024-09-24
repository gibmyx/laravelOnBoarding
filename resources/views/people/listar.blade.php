<x-app-layout>
    <style>
        .container{
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: space-around;
            height: 100px;
            gap: 20px;
            margin: 10px;
            padding: 20px;
            text-align: center;
        }

        .info{

            display: flex;
            flex-direction: column;
            place-content: center;
            width: 500px;
            border: 1px solid black;
            margin: 10px;
            padding: 20px;
            text-align: center;
            background-color: white;
        }

        #icon-edit{
            display: flex;
            flex-direction: column;
            place-content: center;
            height: 35px;
            width: 70px;
            border: 1px solid black;
            border-radius: 10%;
            cursor: pointer;
            background-color: darkblue;
            color: white;
        }

        #icon-delete{
            display: flex;
            flex-direction: column;
            place-content: center;
            height: 35px;
            width: 70px;
            border: 1px solid black;
            border-radius: 10%;
            cursor: pointer;
            background-color: darkred;
            color: white;
        }
    </style>

    <a href="/people">Home Page</a>

    @foreach($peoples as $people)
        <div class="container">
            <div class="info">
                <h1>{{ $people->name}} {{$people->surname}}</h1>
                <p>{{ $people->email }}</p>
                <p>{{ $people->description }}</p>
            </div>

            <div id="icon-edit">
                <a href="/people/{{$people->id}}/editar">Editar</a>
            </div>

            <div id="icon-delete">
                <a href="/people/{{$people->id}}/eliminar">Eliminar</a>
            </div>

        </div>
    @endforeach
</x-app-layout>
