<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>
<body>
    {{-- @php dd($response); @endphp  --}}
    <main class="container align-center p-5">
        <form method="POST" action="{{url("usuario/{$response['data']->id}")}}">
            @csrf             
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="name" name="name" require autocomplete="disable" value="{{$response['data']->name}}">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" require autocomplete="disable" value="{{$response['data']->email}}">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" require value="">
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="active" name="active" {{($response['data']->active) ? "checked" : ""}}>
                <label class="form-check-label" for="active">Activo</label>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </main>
</body>
</html>