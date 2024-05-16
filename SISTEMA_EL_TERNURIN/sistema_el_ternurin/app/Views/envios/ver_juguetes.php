<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Juguetes</title>
    <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
</head>
<body>

    <div id="app">
        <h1>Listado de Juguetes</h1>
        <table border="1">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre del Juguete</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(juguete, index) in juguetes" :key="index">
                    <td>{{ index + 1 }}</td>
                    <td>{{ juguete }}</td>
                </tr>
            </tbody>
        </table>
    </div>
    
</body>

<script>
    new Vue({
        el:'#app',
        data: {
            juguetes:[],
        },
        mounted() {
            this.fetchData();
        },
        methods: {
            async fetchData() {
                try {
                    const response = await fetch('http://localhost/api_juguetes/api/juguetes/obtener_nombres_juguetes');
                    const data = await response.json();
                    this.juguetes = data.datos;
                } catch (error) {
                    console.error('Error al recuperar datos');
                }
            }
        }
    })
</script>

</html>
