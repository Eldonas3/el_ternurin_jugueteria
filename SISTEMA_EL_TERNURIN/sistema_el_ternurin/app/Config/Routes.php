<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('/envios/agregar_juguete','Home::agregar_juguete');
$routes->get('/envios/ver_juguetes','Home::ver_juguetes');
$routes->post('/api/insertar_juguete', 'Home::insertar_juguete');
$routes->get('/envios/prueba','Home::pruebas');
$routes->post('/api/insertar_proveedor', 'Home::insertar_proveedor');
$routes->get('/envios/agregar_proveedor','Home::agregar_proveedor');
$routes->get('/envios/agregar_precio','Home::agregar_precio');
$routes->get('/api/ver_productos', 'Home::ver_productos');
$routes->get('/home/obtener_productos','Home::obtener_productos');
$routes->get('/home/obtener_proveedores','Home::obtener_proveedores');