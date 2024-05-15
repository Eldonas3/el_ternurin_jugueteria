from faker import Faker
import psycopg2
from psycopg2 import sql
from random import randint, choice
from datetime import datetime, timedelta

# Conexión a la base de datos PostgreSQL
conn = psycopg2.connect(
    dbname="juguetes",
    user="postgres",
    password="admin",
    host="localhost"
)
cursor = conn.cursor()

# Instancia Faker para generar datos ficticios
fake = Faker('es_ES')

# Función para insertar datos en la tabla juguete
def insert_juguete(nombre, descripcion, categoria, precio, cantidad_disponible, fecha_ingreso):
    insert_query = sql.SQL("INSERT INTO juguete (nombre, descripcion, categoria, precio, cantidad_disponible, fecha_ingreso) VALUES (%s, %s, %s, %s, %s, %s)")
    cursor.execute(insert_query, [nombre, descripcion, categoria, precio, cantidad_disponible, fecha_ingreso])

# Función para insertar datos en la tabla proveedores
def insert_proveedor(nombre, descripcione, precio, cantidad_disponible):
    # Obtener el ID del último juguete insertado
    cursor.execute("SELECT currval(pg_get_serial_sequence('juguete', 'id'))")
    producto_id = cursor.fetchone()[0]
    
    # Insertar los datos del proveedor
    insert_query = sql.SQL("INSERT INTO proveedores (nombre, descripcione, producto, precio, cantidad_disponible) VALUES (%s, %s, %s, %s, %s)")
    cursor.execute(insert_query, [nombre, descripcione, producto_id, precio, cantidad_disponible])

# Función para insertar datos en la tabla coleccion
def insert_coleccion(nombre, fecha_salida):
    # Obtener el ID del último juguete insertado
    cursor.execute("SELECT currval(pg_get_serial_sequence('juguete', 'id'))")
    producto_id = cursor.fetchone()[0]
    
    # Insertar los datos de la colección
    insert_query = sql.SQL("INSERT INTO coleccion (nombre, fecha_salida, producto) VALUES (%s, %s, %s)")
    cursor.execute(insert_query, [nombre, fecha_salida, producto_id])

# Generar y insertar datos ficticios en las tablas
for _ in range(1000):
    nombre_juguete = fake.company()
    descripcion_juguete = fake.text()
    categoria_juguete = choice(["Muñeca", "Peluche", "Juego de Mesa", "Juguete Educativo", "Figura de Acción"])
    precio_juguete = round(fake.random_number(digits=3, fix_len=True) + fake.random_number(digits=2, fix_len=True) / 100, 2)
    cantidad_disponible_juguete = randint(1, 100)
    fecha_ingreso_juguete = fake.date_between(start_date='-1y', end_date='today')
    
    insert_juguete(nombre_juguete, descripcion_juguete, categoria_juguete, precio_juguete, cantidad_disponible_juguete, fecha_ingreso_juguete)
    
    nombre_proveedor = fake.company()
    descripcione_proveedor = fake.text()
    precio_proveedor = round(precio_juguete * 1.2, 2)  # Precio del proveedor con un margen del 20%
    cantidad_disponible_proveedor = randint(1, 50)
    
    insert_proveedor(nombre_proveedor, descripcione_proveedor, precio_proveedor, cantidad_disponible_proveedor)
    
    nombre_coleccion = fake.color_name() + " Collection"
    fecha_salida_coleccion = fake.date_between(start_date=fecha_ingreso_juguete, end_date='today')
    
    insert_coleccion(nombre_coleccion, fecha_salida_coleccion)

# Commit y cierre de la conexión
conn.commit()
conn.close()
