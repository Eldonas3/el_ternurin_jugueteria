<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jugueteria El Ternurin</title>
    <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
</head>
<body>

    <div id="app">
        <h1>Agregar juguetes</h1>
        <form action="<?=base_url('juguetes/agregarjuguetes'); ?>" method="post">
            <input type="text" name="campo1"></input>
            <select name="campo2">
                <option v-for="(juguete, index) in juguetes" :key="index"> {{ juguete }} </option>   
            </select>
            <input type="submit">
        </form>
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
