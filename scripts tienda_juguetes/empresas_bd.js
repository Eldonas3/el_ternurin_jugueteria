const faker = require('faker');
const mysql = require('mysql');

// Configuración de conexión a la base de datos
const connection = createConnection({
  host: 'localhost',
  user: 'root',
  password: '',
  database: 'servicio_de_envios'
});

// Conectar a la base de datos
connection.connect((err) => {
  if (err) throw err;
  console.log('Conexión establecida con la base de datos');
});

// Función para generar datos de empresa
function generateEmpresa() {
  return {
    nombre: company.companyName(),
    rfc: faker.random.number({ min: 1000000000, max: 9999999999 }),
    precio_envio: parseFloat(finance.amount(10, 50, 2))
  };
}

// Función para generar datos de repartidor
function generateRepartidor(empresaId) {
  return {
    nombre: name.firstName(),
    apellido_materno: name.lastName(),
    apellido_paterno: name.lastName(),
    empresa_empleadora: empresaId
  };
}

// Función para generar datos de entrega
function generateEntrega(empresaId, repartidorId) {
  return {
    status: random.boolean(),
    empresa_repartidora: empresaId,
    repartidor_encargado: repartidorId
  };
}

// Insertar datos de empresa
for (let i = 0; i < 500; i++) {
  const empresa = generateEmpresa();
  connection.query('INSERT INTO empresa SET ?', empresa, (err, result) => {
    if (err) throw err;
    console.log('Empresa insertada:', result.insertId);
    
    // Insertar datos de repartidor para esta empresa
    for (let j = 0; j < 1000; j++) {
      const repartidor = generateRepartidor(result.insertId);
      connection.query('INSERT INTO repartidor SET ?', repartidor, (err, result) => {
        if (err) throw err;
        console.log('Repartidor insertado:', result.insertId);
        
        // Insertar datos de entrega para este repartidor
        const entrega = generateEntrega(empresa.id, result.insertId);
        connection.query('INSERT INTO entrega SET ?', entrega, (err, result) => {
          if (err) throw err;
          console.log('Entrega insertada:', result.insertId);
        });
      });
    }
  });
}

// Cerrar conexión a la base de datos
connection.end();
