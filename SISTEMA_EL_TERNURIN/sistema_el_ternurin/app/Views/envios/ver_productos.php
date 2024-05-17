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
                    <th>Nombre</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(producto, index) in productos" :key="index">
                    <td>{{ producto.nombre }}</td>
                </tr>
            </tbody>
        </table>
    </div>
    
</body>

<script>
    new Vue({
        el: '#app',
        data: {
            productos: []
        },
        mounted() {
            this.fetchData();
        },
        methods: {
            async fetchData() {
    try {
        const response = await axios.get('/home/obtener_productos');
        this.productos = response.data;
    } catch (error) {
        console.error('Error al recuperar datos');
    }
}

        }
    });
</script>

</html>