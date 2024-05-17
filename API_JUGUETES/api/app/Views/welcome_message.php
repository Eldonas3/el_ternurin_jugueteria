<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>API juguetes</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Estilos adicionales */
        body {
            background-color: #f8f9fa; /* Color de fondo */
        }
        .table-blue {
            background-color: #4169E1; /* Color azul rey */
            color: #fff; /* Color de texto blanco */
        }
        .table-blue th,
        .table-blue td {
            border-color: #fff; /* Color de borde blanco */
        }
        /* Estilos para centrar el div */
        .center-div {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="center-div">
            <h1>Documentación</h1>
        </div>
        <table class="table table-bordered table-blue">
            <thead>
                <tr>
                    <th scope="col">Método</th>
                    <th scope="col">Parámetros</th>
                    <th scope="col">Descripción</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>GET</td>
                    <td>/api/juguetes/nombre</td>
                    <td>Retorna toda la info de todos los juguetes con un nombre especifico</td>
                </tr>
                <tr>
                    <td>GET</td>
                    <td>/api/juguetes/cantidadJuguete</td>
                    <td>Retorna todas la cantidades disponibles de un juguete especifico</td>
                </tr>
                <tr>
                    <td>GET</td>
                    <td>/api/jueguetes/empresa</td>
                    <td>retorna el numero de empresas que ofrecen un juguete especifico</td>
                </tr>
                <tr>
                    <td>GET</td>
                    <td>/api/juguetes/categoria</td>
                    <td>retorna los juguetes de una categoria ingresada</td>
                </tr>
                <tr>
                    <td>GET</td>
                    <td>/api/juguetes/obtener_todo</td>
                    <td>retorna todos los juguetes de la base de datos</td>
                </tr>
                <tr>
                    <td>GET</td>
                    <td>/api/jueguetes/jueguete_id</td>
                    <td>obtiene la información de un juguete específico según su ID</td>
                </tr>
                <tr>
                    <td>GET</td>
                    <td>/api/juguetes/proveedor_juguete</td>
                    <td>retorna todos los proveedores de un juguete específico según su ID</td>
                </tr>
                <tr>
                    <td>GET</td>
                    <td>/api/juguetes/collecion_jueguete</td>
                    <td>retorna todas las colecciones a las que pertenece un juguete específico según su ID</td>
                </tr>
                <tr>
                    <td>GET</td>
                    <td>/api/juguetes/obtener_nombres_juguetes</td>
                    <td>Retorna todos los nombres de los juguetes</td>
                </tr>
                <tr>
                    <td>GET</td>
                    <td>/api/juguetes/nombres_proveedores</td>
                    <td>Retorna todos los nombres de los proveedores</td>
                </tr>
                <!-- Agrega más filas según sea necesario -->
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS (opcional, para funcionalidades adicionales) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
