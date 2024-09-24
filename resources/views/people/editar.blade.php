<x-app-layout>
    <style>
        h1 {
            text-align: center;
            font-size: 24px;
        }
        .container{
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            gap: 20px;

            border: 1px solid black;
        }

        .button{
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            color: white;
            background-color: #005cc5;
        }
    </style>

    <form action="/people/{{$people->id}}" method="post">

        @csrf

        @method('put')

        <a href="/people">Home Page</a>

        <div class="container">

            <h1>EDITAR CRUD</h1>

            <div>
                <label for="name">Nombre</label>
                <input type="text" id="name" name="name" value="{{$people->name}}">
            </div>

            <div>
                <label for="surname">Apellido</label>
                <input type="text" id="surname" name="surname" value="{{$people->surname}}">
            </div>

            <div>
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="{{$people->email}}">
            </div>

            <div>
                <label for="description">Descripcion</label>
                <input type="text" id="description" name="description" value="{{$people->description}}">
            </div>

            <input class="button" type="submit" name="enviar" id="enviar" value="Actualizar">

        </div>
    </form>
</x-app-layout>
