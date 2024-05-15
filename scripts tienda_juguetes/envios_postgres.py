from faker import Faker
import psycopg2
import random

# Conexión a la base de datos
conn = psycopg2.connect(
    dbname="servicio_de_envios",
    user="postgres",
    password="admin",
    host="localhost",
    port="5432"
)

# Crear un cursor
cur = conn.cursor()

# Instancia Faker
fake = Faker()

# Generar datos para la tabla 'empresa'
for _ in range(25):
    nombre_empresa = fake.company()
    rfc = random.randrange(10**17, 10**18)
    precio_envio = round(random.uniform(5, 20), 2)
    cur.execute("INSERT INTO empresa (nombre, rfc, precio_envio) VALUES (%s, %s, %s)", (nombre_empresa, rfc, precio_envio))

# Generar datos para la tabla 'repartidor'
for _ in range(200):
    nombre = fake.first_name()
    apellido_paterno = fake.last_name()
    apellido_materno = fake.last_name()
    empresa_empleadora = random.randint(1, 5)
    cur.execute("INSERT INTO repartidor (nombre, apellido_materno, apellido_paterno, empresa_empleadora) VALUES (%s, %s, %s, %s)", (nombre, apellido_materno, apellido_paterno, empresa_empleadora))

# Generar datos para la tabla 'entrega'
for _ in range(500):
    status = random.choice([True, False])
    empresa_repartidora = random.randint(1, 25)
    repartidor_encargado = random.randint(1, 200)
    cur.execute("INSERT INTO entrega (status, empresa_repartidora, repartidor_encargado) VALUES (%s, %s, %s)", (status, empresa_repartidora, repartidor_encargado))

# Commit y cerrar conexión
conn.commit()
cur.close()
conn.close()
