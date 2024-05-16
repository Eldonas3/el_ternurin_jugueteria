<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('/envios/agregar_juguete','Home::agregar_juguete');
$routes->get('/envios/ver_juguetes','Home::ver_juguetes');