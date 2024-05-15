const faker = require('faker');
const mysql = require('mysql');

// Configuración de conexión a la base de datos
const connection = createConnection({
  host: 'localhost',
  user: 'root',
  password: '',
  database: 'juguetes'
});

// Conectar a la base de datos
connection.connect((err) => {
  if (err) throw err;
  console.log('Conexión establecida con la base de datos');
});

// Función para generar datos de juguetes
function generateJuguete() {
  return {
    nombre: commerce.productName(),
    descripcion: lorem.paragraph(),
    categoria: random.arrayElement(['Muñecas', 'Construcción', 'Vehículos', 'Puzzles']),
    precio: parseFloat(commerce.price()),
    cantidad_disponible: datatype.number({ min: 1, max: 100 }),
    fecha_ingreso: date.between('2020-01-01', '2024-05-01').toISOString().split('T')[0]
  };
}

// Función para generar datos de proveedores
function generateProveedor() {
  return {
    nombre: company.companyName(),
    descripcione: lorem.paragraph(),
    producto: datatype.number({ min: 1, max: 100 }),
    precio: parseFloat(commerce.price()),
    cantidad_disponible: datatype.number({ min: 1, max: 100 })
  };
}

// Función para generar datos de colecciones
function generateColeccion() {
  return {
    nombre: lorem.words(),
    fecha_salida: date.between('2020-01-01', '2024-05-01').toISOString().split('T')[0],
    producto: datatype.number({ min: 1, max: 100 })
  };
}

// Insertar datos de juguetes
for (let i = 0; i < 1000; i++) {
  const juguete = generateJuguete();
  connection.query('INSERT INTO juguete SET ?', juguete, (err, result) => {
    if (err) throw err;
    console.log('Juguete insertado:', result.insertId);
  });
}

// Insertar datos de proveedores
for (let i = 0; i < 200; i++) {
  const proveedor = generateProveedor();
  connection.query('INSERT INTO proveedores SET ?', proveedor, (err, result) => {
    if (err) throw err;
    console.log('Proveedor insertado:', result.insertId);
  });
}

// Insertar datos de colecciones
for (let i = 0; i < 300; i++) {
  const coleccion = generateColeccion();
  connection.query('INSERT INTO coleccion SET ?', coleccion, (err, result) => {
    if (err) throw err;
    console.log('Coleccion insertada:', result.insertId);
  });
}

// Cerrar conexión a la base de datos
connection.end();
