<x-app-layout>
    <style>

        h1 {

            text-align: center;
            font-size: 40px;
            margin-top: 20px;
            width: 1000px;
            height: 10px;
        }

        body{
            background-color: lightgray;
        }

        .container{
            display: flex;
            justify-content: center;
            align-items: center;
            width: 1000px;
            height: 300px;
        }

        #card{
            cursor: pointer;

            border: 1px solid white;
            border-radius:  100px;
            box-shadow: black 5px 5px;
            margin-right: 10px;
            width: 100px;
            height: 50px;
            background-color: rosybrown;
        }

    </style>
        <div>

            <h1>BIENVENIDO AL CRUD</h1>

            <div class="container">

                <div class="container" id="card"><a href="/people/crear">Crear</a></div>

                <div class="container" id="card"><a href="/people/listar">Listar</a></div>

            </div>
        </div>

</x-app-layout>
