<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página privada</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>
<body>
    <main class="container">
        <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
            <a class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none" href="#">
                Página privada @auth de {{Auth::user()->name}} @endauth
            </a>
            <div class="col-md-3 text-end">
                <a href="{{route('logout')}}"><button type="button" class="btn btn-outline-primary me-2">Salir</button></a>
            </div>
        </header>
    </main>
    <article class="container">
        <h2>Tu sesión privada</h2>
    </article>
</body>
</html>