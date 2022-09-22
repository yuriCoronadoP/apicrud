<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>
<body>
    <main class="container align-center p-5">
        <form method="POST" action="{{route('validar-registro')}}">
            @csrf
            <div class="mb-3">
                <label for="emailInput" class="form-label">Email</label>
                <input type="email" class="form-control" id="emailInput" name="email" require autocomplete="disable">
            </div>
            <div class="mb-3">
                <label for="passwordInput" class="form-label">Password</label>
                <input type="password" class="form-control" id="passwordInput" name="password" require>
            </div>
            <div class="mb-3">
                <label for="userInput" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="userInput" name="name" require autocomplete="disable">
            </div>
            <button type="submit" class="btn btn-primary">Registrarse</button>
        </form>
    </main>
</body>
</html>