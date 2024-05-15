import mysql.connector
from faker import Faker
import random
from datetime import datetime, timedelta

# Conexión a la base de datos
mydb = mysql.connector.connect(
  host="127.0.0.1",
  user="root",
  password="",
  database="juguetes"
)

mycursor = mydb.cursor()
fake = Faker()

# Función para generar datos falsos para la tabla juguete
def generate_juguete():
    nombre = fake.word()
    descripcion = fake.text()
    categoria = fake.random_element(elements=('Juguetes para niños', 'Juguetes para niñas', 'Juguetes educativos', 'Juguetes de exterior'))
    precio = round(random.uniform(5, 1000), 2)
    cantidad_disponible = random.randint(1, 100)
    fecha_ingreso = fake.date_between(start_date='-2y', end_date='today')
    return (nombre, descripcion, categoria, precio, cantidad_disponible, fecha_ingreso)

# Función para generar datos falsos para la tabla proveedores
def generate_proveedores(juguete_id):
    nombre = fake.company()
    descripcione = fake.text()
    precio = round(random.uniform(1, 100), 2)
    cantidad_disponible = random.randint(1, 50)
    return (nombre, descripcione, juguete_id, precio, cantidad_disponible)

# Función para generar datos falsos para la tabla coleccion
def generate_coleccion(juguete_id):
    nombre = fake.word()
    fecha_salida = fake.date_between(start_date='today', end_date='+2y')
    return (nombre, fecha_salida, juguete_id)

# Generar datos falsos y llenar la tabla juguete
for _ in range(500):
    juguete_data = generate_juguete()
    sql = "INSERT INTO juguete (nombre, descripcion, categoria, precio, cantidad_disponible, fecha_ingreso) VALUES (%s, %s, %s, %s, %s, %s)"
    mycursor.execute(sql, juguete_data)
    juguete_id = mycursor.lastrowid
    mydb.commit()
    
    # Llenar la tabla proveedores
    proveedores_data = generate_proveedores(juguete_id)
    sql = "INSERT INTO proveedores (nombre, descripcione, producto, precio, cantidad_disponible) VALUES (%s, %s, %s, %s, %s)"
    mycursor.execute(sql, proveedores_data)
    mydb.commit()

    # Llenar la tabla coleccion
    coleccion_data = generate_coleccion(juguete_id)
    sql = "INSERT INTO coleccion (nombre, fecha_salida, producto) VALUES (%s, %s, %s)"
    mycursor.execute(sql, coleccion_data)
    mydb.commit()

print("Datos insertados correctamente.")