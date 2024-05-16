<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// 1.-
$routes->get('/api/juguetes/nombre','JugueteController::getJuguetePorNombre');
// 2.-
$routes->get('/api/juguetes/cantidadJuguete','JugueteController::getCantidadJuguete');
// 3.-
$routes->get('/api/jueguetes/empresa','JugueteController::getNumeroEmpresasPorJuguete');
//4.-
$routes->get('/api/juguetes/categoria', 'JugueteController::getJuguetesPorCategoria');
// 5.-
$routes->get('/api/juguetes/obtener_todo','JugueteController::getAllJuguetes');
// 6.-
$routes->get('/api/jueguetes/jueguete_id','JugueteController::getJuguetePorId');
// 7.-
$routes->get('/api/juguetes/proveedor_juguete','JugueteController::getProveedoresPorJuguete');
// 8.-
$routes->get('/api/juguetes/collecion_jueguete','JugueteController::getColeccionesPorJuguete');
// 9.-
$routes->get('/api/juguetes/obtener_nombres_juguetes','JugueteController::obtener_juguetes');