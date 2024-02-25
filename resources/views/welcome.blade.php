<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cine en Línea</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <link href="{{ asset('estilos.css') }}" rel="stylesheet">
    <script src="{{ asset('peliculas.js') }}"></script>
    <link rel="stylesheet" href="style.css">

    <style>
        body {
            background-image: linear-gradient(to right, #fb7a7a, #ff789f, #ed8de3, #d49ef4, #b983e9, #c370d0, #c85db4, #c94a98, #da85b6, #d66ba8, #e67bc6, #c451d8);
            margin: 0;
            font-family: 'Arial', sans-serif;
            padding-bottom: 20px;
        }

        h1 {
            color: #333;
            text-align: center;
            text-transform: uppercase;
            border-bottom: 8px solid #1b84ca;
            padding-bottom: 10px;
            margin-top: 20px;
            font-size: 36px;
        }

        button {
            background-color: purple;
            width: 229px;
            margin-bottom: 10px;
            color: white;
            border: none;
        }

        .modal-title {
            color: #5e35b1;
        }

        .modal-content {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .footer {
            text-align: center;
            color: white;
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            background-color: #5e35b1;
            padding: 10px;
        }

        .invisible {
            display: none;
        }

        .centro {
            text-align: center;
            margin-top: 20px;
        }

        .centrado {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .container {
            margin-top: 20px;
        }

        .card {
            background-color: #fff;
            border: none;
            border-radius: 15px;
            transition: transform 0.2s;
        }

        .card:hover {
            transform: scale(1.05);
        }

        .card-img-top {
            width: 100%;
            height: auto;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
        }

        .card-title {
            font-size: 18px;
            font-weight: bold;
            color: #5e35b1;
            margin-top: 10px;
        }

        .card-text {
            font-size: 14px;
            color: #e6398f;
        }

        .modal-body h7 {
            display: inline-block;
            margin-right: 10px;
            font-size: 16px;
            color: #5e35b1;
        }

        .modal-body input {
            margin: 5px;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }

        .modal-footer button {
            background-color: #5e35b1;
            border: none;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        .modal-footer button:hover {
            background-color: #4527a0;
        }
    </style>
</head>

<body>
    <h1>. . . .  . . . . . . . . . . . . Cine en Línea . . . . . . . . . . . . . . VMV</h1>

    <div class="centro">
        <button class="btn btn-primary"><a class="nav-link active" aria-current="page" href="/agregar">Agregar Pelicula</a></button>
    </div>

    <div class="centrado">
        <div class="container">
            <div class="row row-cols-1">
                @foreach ($peli as $item)
                <button type="button" class="btn btn-success buttona" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="mostrarDetalle('{{ $item->Nombre }}', '{{ $item->id }}', '{{ $item->precio }}')">
                    <div class="col card-margin">
                        <div class="card text-bg">
                            <img src="{{ asset($item->Imagen) }}" class="card-img-top" alt="{{ $item->Nombre }}">
                            <div class="card-body">
                                <h5 class="card-title" name="nombre1">{{ $item->Nombre }}</h5>
                                <p class="card-text">
                                    <strong>Sala:</strong> <strong name="id1">{{ $item->id }}</strong><br>
                                    <strong>Precio:</strong> <strong name="precio1">{{ $item->precio }}</strong><br>
                                </p>
                            </div>
                        </div>
                    </div>
                </button>
                @endforeach
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Pagar boletos</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p id="modal-precio2" class="invisible"></p>
                    <p id="modal-id2" class="invisible"></p>

                    <h7 id="modal-nombre"></h7>,
                    <h7 id="modal-id"></h7>,
                    <h7 id="modal-precio"></h7>

                    <p>Entradas <input type="text" id="entradas">
                        <button onclick="pagar()">Total a pagar:</button><br>
                        Pagar <input type="text" id="pagar"></p>
                </div>
                <div class="modal-footer">
                    <form action="{{ route('Cine.store') }}" method="POST">
                        @csrf
                        <input type="text" id="idform" name="idform" class="invisible">
                        <input type="text" id="entradas2" name="entradas2" class="invisible">
                        <button type="submit">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer">
        <p>&copy; 2024 Cine en Línea VMV</p>
    </footer>

</body>

</html>
