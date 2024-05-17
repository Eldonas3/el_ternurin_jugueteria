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
        <h1>Buscar y agregar producto</h1>
        <form @submit.prevent="submitForm">
            <select v-model="selectedProducto">
                <option v-for="(producto, index) in productos" :key="index" :value="producto.nombre"> 
                    {{ producto.nombre }} 
                </option>
            </select>
            <input type="submit" value="Buscar e insertar">
        </form>
    </div>
    
</body>

<script>
    new Vue({
        el: '#app',
        data: {
            productos: [],
            selectedProducto: ''
        },
        mounted() {
            this.fetchData();
        },
        methods: {
            async fetchData() {
                try {
                    const db = \Config\Database::connect();
                    const query = db.table('producto')->select('nombre')->get();
                    this.productos = query.getResult();
                } catch (error) {
                    console.error('Error al recuperar datos');
                }
            },
            async submitForm() {
                try {
                    const response = await axios.get('http://localhost/api_juguetes/api/juguetes/nombre?nombre=' + this.selectedProducto);
                    const data = await response.data;
                    if (data.precio) {
                        const db = \Config\Database::connect();
                        const dataProducto = {
                            nombre: this.selectedProducto,
                            precio: data.precio
                        };
                        db.table('producto')->insert($dataProducto);
                        console.log('Producto insertado correctamente');
                    } else {
                        console.log('No se encontró el producto');
                    }
                } catch (error) {
                    console.error(error);
                }
            }
        }
    });
</script>

</html>