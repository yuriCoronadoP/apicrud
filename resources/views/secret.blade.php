<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página privada</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <main class="container">
        <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
            <a class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none" href="#">
                Bienvenido @auth de {{Auth::user()->name}} @endauth
            </a>
            <div class="col-md-3 text-end">
                <a href="{{route('logout')}}" class="btn btn-outline-primary me-2">Salir</a>
            </div>
        </header>

        <div class="col-md-12">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Activo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    
                    <?php 
                    foreach ($response["data"] as $key => $value) {
                    ?>
                    <tr>
                        <td>{{$value->name}}</td>
                        <td>{{$value->email}}</td>
                        <td class="text-center">{!!($value->active == 1) ? '<i class="fa-2x text-success fa-regular fa-circle-check"></i>' : '<i class="fa-2x text-secondary fa-regular fa-circle"></i>'!!}</td>
                        <td>
                            <a href="usuario/{{$value->id}}" class="btn btn-secondary">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                            <form action="{{url("usuario/{$value->id}")}}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

        <div>
            <p><a href="{{route('registro')}}">Registrar nuevo usuario</a></p>
        </div>
    </main>
    
</body>
</html>