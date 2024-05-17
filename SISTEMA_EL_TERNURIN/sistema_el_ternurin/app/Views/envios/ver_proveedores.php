<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jugueteria El Ternurin</title>
    <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>
<body>

    <div id="app">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Proveedor</th> <!-- Agregamos una columna adicional para mostrar el nombre de la empresa -->
                </tr>
            </thead>
            <tbody>
                <tr v-for="(proveedor, index) in proveedores" :key="index">
                    <td>{{ proveedor.id }}</td> <!-- Mostramos el ID del proveedor -->
                    <td>{{ proveedor.empresa_proveedora }}</td> <!-- Mostramos el nombre de la empresa -->
                </tr>
            </tbody>
        </table>
    </div>
    
</body>

<script>
    new Vue({
        el: '#app',
        data: {
            proveedores: [] // Cambiamos el nombre de la variable de productos a proveedores
        },
        mounted() {
            this.fetchData();
        },
        methods: {
            async fetchData() {
                try {
                    const response = await axios.get('/home/obtener_proveedores'); // Cambiamos la ruta para obtener proveedores
                    this.proveedores = response.data;
                } catch (error) {
                    console.error('Error al recuperar datos');
                }
            }
        }
    });
</script>

</html>
