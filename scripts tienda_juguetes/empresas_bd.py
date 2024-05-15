import mysql.connector
from faker import Faker
import random

# Conexión a la base de datos
mydb = mysql.connector.connect(
  host="127.0.0.1",
  user="root",
  password="",
  database="servicio_de_envios"
)

mycursor = mydb.cursor()
fake = Faker()

# Función para generar datos falsos para la tabla empresa
def generate_empresa():
    nombre = fake.company()
    rfc = random.randint(100000000000, 999999999999)
    precio_envio = round(random.uniform(5, 50), 2)
    return (nombre, rfc, precio_envio)

# Función para generar datos falsos para la tabla repartidor
def generate_repartidor(empresa_id):
    nombre = fake.first_name()
    apellido_materno = fake.last_name()
    apellido_paterno = fake.last_name()
    return (nombre, apellido_materno, apellido_paterno, empresa_id)

# Función para generar datos falsos para la tabla entrega
def generate_entrega(empresa_id, repartidor_id):
    status = random.choice([True, False])
    return (status, empresa_id, repartidor_id)

# Generar datos falsos y llenar la tabla empresa
for _ in range(500):
    empresa_data = generate_empresa()
    sql = "INSERT INTO empresa (nombre, rfc, precio_envio) VALUES (%s, %s, %s)"
    mycursor.execute(sql, empresa_data)
    empresa_id = mycursor.lastrowid
    mydb.commit()
    
    # Llenar la tabla repartidor
    repartidor_data = generate_repartidor(empresa_id)
    sql = "INSERT INTO repartidor (nombre, apellido_materno, apellido_paterno, empresa_empleadora) VALUES (%s, %s, %s, %s)"
    mycursor.execute(sql, repartidor_data)
    repartidor_id = mycursor.lastrowid
    mydb.commit()

    # Llenar la tabla entrega
    entrega_data = generate_entrega(empresa_id, repartidor_id)
    sql = "INSERT INTO entrega (status, empresa_repartidora, repartidor_encargado) VALUES (%s, %s, %s)"
    mycursor.execute(sql, entrega_data)
    mydb.commit()

print("Datos insertados correctamente.")
