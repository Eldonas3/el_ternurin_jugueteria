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
        <h1>Agregar proveedores</h1>
        <form @submit.prevent="submitForm">
            <select v-model="selectedProveedor">
                <option v-for="(proveedor, index) in proveedores" :key="index" :value="proveedor.nombre"> 
                    {{ proveedor.nombre }} 
                </option>
            </select>
            <select v-model="selectedEmpresa">
                <option v-for="(empresa, index) in empresas" :key="index" :value="empresa.nombre"> 
                    {{ empresa.nombre }} 
                </option>
            </select>
            <input type="submit" value="Agregar Proveedor">
        </form>
    </div>
    
</body>

<script>
    new Vue({
        el: '#app',
        data: {
            proveedores: [],
            selectedProveedor: '',
            empresas: [],
            selectedEmpresa: ''
        },
        mounted() {
            this.fetchData();
        },
        methods: {
            async fetchData() {
                try {
                    const responseProveedores = await fetch('http://localhost/api_juguetes/api/juguetes/nombres_proveedores');
                    const dataProveedores = await responseProveedores.json();
                    this.proveedores = dataProveedores.datos;

                    const responseEmpresas = await fetch('http://localhost/api_proveedores/empresa/api/nombres_empresas');
                    const dataEmpresas = await responseEmpresas.json();
                    this.empresas = dataEmpresas.datos;
                } catch (error) {
                    console.error('Error al recuperar datos');
                }
            },
            async submitForm() {
                try {
                    const response = await axios.post('http://localhost:8080/api/insertar_proveedor', {
                        nombre_proveedor: this.selectedProveedor,
                        nombre_empresa: this.selectedEmpresa
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