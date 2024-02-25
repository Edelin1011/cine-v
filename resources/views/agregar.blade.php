<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('estilos.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1kR+x4ZlbqMjfx3sdF8duvo7z1peR5+0JwRq8kl9byPMb0j3Bsq3VFFxMlFcO5t" crossorigin="anonymous"></script>
    <script src="{{ asset('peliculas.js') }}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            background-color: #ec6385;
            color: white;
            font-family: 'Arial', sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        form {
            max-width: 400px;
            width: 100%;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }

        h1 {
            text-align: center;
            color: #5e35b1;
        }

        h3 {
            margin-top: 10px;
            font-size: 16px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            color: #5e35b1;
        }

        .btn-primary {
            background-color: #5e35b1;
            border-color: #5e35b1;
        }

        .btn-primary:hover {
            background-color: #4527a0;
            border-color: #4527a0;
        }
    </style>
</head>
<body>

    <form action="{{ route('Cine.stori') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <h1>.. Agregar Pelicula ..</h1>
        
        <div class="form-group">
            <label for="nombre">Nombre ...</label>
            <input type="text" name="nombre" id="nombre" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="Precio">Precio ...</label>
            <input type="text" name="Precio" id="Precio" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="imagen">Imagen ...</label>
            <input type="file" id="imagen" name="imagen" accept="image/*" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary"><i class="fas fa-paper-plane"></i> Enviar</button>
    </form>

</body>
</html>
