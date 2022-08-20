<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</head>
<body>
<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>EDITAR PROVEEDOR</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('proveedores.index') }}" title="Go back">INICIO</a>
            </div>
        </div>
    </div>

    
    <form action="{{ route('proveedores.update', $proveedor->id_proveedor) }}" method="POST" >

    @csrf  

    @method('PUT') 
        
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nombre de la empresa:</strong>
                    <input type="text" name="nombre_empresa" value="{{ $proveedor->nombre_empresa }}" class="form-control" placeholder="Nombre de empresa">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Representante:</strong>
                    <input type="text" name="representante" value="{{ $proveedor->representante }}" class="form-control" placeholder="Representante">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Telefono:</strong>
                    <input type="number" name="telefono" value="{{ $proveedor->telefono }}" class="form-control" placeholder="Telefono">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Correo Electronico:</strong>
                    <input type="mail" name="correo" value="{{ $proveedor->correo }}" class="form-control" placeholder="Cost">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Servicios actuales:</strong>
                    <input type="text" name="tipo" value="{{ $proveedor->tipo_servicio }}" class="form-control" placeholder="Servicios">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Servicio:</strong>
                </div>
                <select multiple="multiple" required name="tipo_servicio[]">
                        @foreach($servicios as $servicio)
                            <option value={{ $servicio->nombre_servicio }}>{{ $servicio->nombre_servicio }}</option>
                        @endforeach
                </select>
            </div>
            
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
</body>
</html>