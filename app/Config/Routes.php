<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');

//unidades
$routes->get('/unidades', 'UnidadesController::index');
$routes->get('/unidades/eliminados', 'UnidadesController::eliminados');
$routes->get('/unidades/nuevo', 'UnidadesController::nuevo');
$routes->post('/unidades/insertar', 'UnidadesController::insertar');
$routes->post('/unidades/actualizar', 'UnidadesController::actualizar');
$routes->get('/unidades/eliminar/(:num)', 'UnidadesController::eliminar/$1');
$routes->get('/unidades/reingresar/(:num)', 'UnidadesController::reingresar/$1');
$routes->get('/unidades/editar/(:num)', 'UnidadesController::editar/$1');


//categorias
$routes->get('/categorias', 'CategoriasController::index');
$routes->get('/categorias/nuevo', 'CategoriasController::nuevo');
$routes->get('/categorias/eliminados', 'CategoriasController::eliminados');
$routes->post('/categorias/insertar', 'CategoriasController::insertar');
$routes->post('/categorias/actualizar', 'CategoriasController::actualizar');
$routes->get('/categorias/eliminar/(:num)', 'CategoriasController::eliminar/$1');
$routes->get('/categorias/reingresar/(:num)', 'CategoriasController::reingresar/$1');
$routes->get('/categorias/editar/(:num)', 'CategoriasController::editar/$1');


//Productos
$routes->get('/productos', 'ProductosController::index');
$routes->get('/productos/nuevo', 'ProductosController::nuevo');
$routes->get('/productos/eliminados', 'ProductosController::eliminados');
$routes->post('/productos/insertar', 'ProductosController::insertar');
$routes->post('/productos/actualizar', 'ProductosController::actualizar');
$routes->get('/productos/eliminar/(:num)', 'ProductosController::eliminar/$1');
$routes->get('/productos/reingresar/(:num)', 'ProductosController::reingresar/$1');
$routes->get('/productos/editar/(:num)', 'ProductosController::editar/$1');
/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
