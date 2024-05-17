<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Estilos adicionales */
        body {
            padding-top: 60px; /* Ajustar según la altura de la barra de navegación */
        }
        .center {
            text-align: center;
        }
        .btn-large {
            font-size: 24px;
            padding: 20px 40px;
            margin: 10px;
        }
    </style>
</head>
<body>
    <!-- Barra de navegación -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="">El Ternurin</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Ventas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Envios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Inventario</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Contenido principal -->
    <div class="container">
    <h1 class="text-center mt-5">El Ternurin Jugueteria</h1>
    <div class="center mt-5">
    <a href="<?=base_url('/envios/ver_juguetes'); ?>"> 
    <button class="btn btn-large btn-success">Ver juguetes API</button>
    </a>
    <a href="<?=base_url('/envios/agregar_juguete'); ?>">
    <button class="btn btn-large btn-success">Insertar Juguetes</button>  
    </a>       
    <a href="<?=base_url('/envios/agregar_proveedor'); ?>">
    <button class="btn btn-large btn-success">Insertar Proveedores</button>
    </a>
    </div>
    </div>

    <!-- Contenido no tan principal -->
    <div class="container">
    <div class="center mt-5">
    <a href="<?=base_url('/api/ver_productos'); ?>"> 
    <button class="btn btn-large btn-success">Ver Juguetes BD Ternurin</button>
    </a>
    <a href="<?=base_url('/home/obtener_proveedores'); ?>">
    <button class="btn btn-large btn-success">Ver Proveedores BD Ternurin</button>  
    </a>
    </div>
    </div>

    <!-- Bootstrap JS y jQuery (necesario para el funcionamiento de la barra de navegación) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
