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
        <h1>Agregar juguetes</h1>
        <form @submit.prevent="submitForm">
            <select v-model="selectedJuguete">
                <option v-for="(juguete, index) in juguetes" :key="index" :value="juguete.nombre"> 
                    {{ juguete.nombre }} 
                </option>
            </select>
            <input type="submit" value="Agregar Juguete">
        </form>
    </div>
    
</body>

<script>
    new Vue({
        el: '#app',
        data: {
            juguetes: [],
            selectedJuguete: ''
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
            },
            async submitForm() {
                try {
                    const response = await axios.post('http://localhost:8080/api/insertar_juguete', {
                        nombre: this.selectedJuguete
                    });
                    console.log(response.data);
                } catch (error) {
                    console.error(error);
                }
            }
        }
    });
</script>

</html>
