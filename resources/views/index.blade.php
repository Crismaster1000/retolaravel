<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</head>
<body>
    <form action="" class="col-9">
    
        <div class="input-group">
            <span class="input-group-btn mr-5 mt-1">
                <button class="btn btn-primary">Buscar</button>
            </span>
            
            <input type="search" name="search" id="" class="form-control mr-2" placeholder="Buscador">
        </div>
        
        
    </form>

    <h1>PROVEEORES</h1>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <a class="btn btn-success" href="{{ route('proveedores.create') }}" >CREAR PROVEEDOR</a>
        </div>
    </div>
    <table class="table">
        <thead>
            <th>Empresa</th>
            <th>Representante</th>
            <th>Telefono</th>
            <th>Correo Eelectronico</th>
            <th>Servicio</th>
        </thead>
        <tbody>
            @foreach($datos as $dato)
            <tr>
                <td>{{ $dato->nombre_empresa }}</td>
                <td>{{ $dato->representante }}</td>
                <td>{{ $dato->telefono }}</td>
                <td>{{ $dato->correo }}</td>
                <td>{{ $dato->tipo_servicio }}</td>
                <td><a href="{{ route('proveedores.edit', $dato->id_proveedor) }}" class="btn btn-warning">Editar</a></td>
                <td>
                <form action="{{ route('proveedores.destroy', $dato->id_proveedor )}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Borrar</button>
                </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <br>
    <h1>SERVICIOS</h1>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <a class="btn btn-success" href="{{ route('servicio.create') }}" >CREAR SERVICIO</a>
        </div>
    </div>
    <table class="table">
        <thead>
            <th>Codigo</th>
            <th>Nombre</th>
            <th>Area</th>
        </thead>
        <tbody>
            @foreach($servicios as $servicio)
            <tr>
                <td>{{ $servicio->codigo_servicio }}</td>
                <td>{{ $servicio->nombre_servicio }}</td>
                <td>{{ $servicio->area_servicio }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>