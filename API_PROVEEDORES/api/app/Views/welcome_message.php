<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Api repartidores</title>
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
                    <td>/empresa/api/precio_por_empresa</td>
                    <td>Retorna todas las empresas y sus precios de envio</td>
                </tr>
                <tr>
                    <td>GET</td>
                    <td>/empresa/api/comparar_precio</td>
                    <td>Retorna las empresas con un precio menor al indicado</td>
                </tr>
                <tr>
                    <td>GET</td>
                    <td>/empresa/api/obtener_precio</td>
                    <td>Retorna el precio de envio de una empresa especifica</td>
                </tr>
                <tr>
                    <td>GET</td>
                    <td>/empresa/api/obetener_repartidores</td>
                    <td>Retorna los repartidores de una empresa</td>
                </tr>
                <tr>
                    <td>GET</td>
                    <td>/empresa/api/obtener_nombre_empresa</td>
                    <td>Retorna la empresa de un empleado especifico</td>
                </tr>
                <tr>
                    <td>GET</td>
                    <td>/empresa/api/obtener_entregas</td>
                    <td>Obtener todas la entregas que haya hecho un repartidor</td>
                </tr>
                <tr>
                    <td>GET</td>
                    <td>/empresa/api/obtener_entregas_empresa</td>
                    <td>retorna todas la entregas hechas por una empresa en especifico</td>
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
