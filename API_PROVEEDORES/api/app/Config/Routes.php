<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

//1.- 
$routes->get('/empresa/api/precio_por_empresa','EmpresaController::obtener_empresas_precios');
//2.-
$routes->get('/empresa/api/comparar_precio','EmpresaController::comparar_precio');
// 3.-
$routes->get('/empresa/api/obtener_precio','EmpresaController::obtener_precio_empresa');
//4.-
$routes->get('/empresa/api/obetener_repartidores','EmpresaController::obtener_repartidores');
//5.-
$routes->get('/empresa/api/obtener_nombre_empresa','EmpresaController::obtener_nombre_empresa');
// 6.-
$routes->get('/empresa/api/obtener_entregas','EmpresaController::obtener_entregas_repartidor');
// 7.-
$routes->get('/empresa/api/obtener_entregas_empresa','EmpresaController::obtener_entregas_hechas_por_empresa');
// 8.-
$routes->get('/empresa/api/nombres_empresas','EmpresaController::obtener_nombre_empresas');