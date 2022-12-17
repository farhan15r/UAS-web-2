<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/cars', 'Home::cars');

$routes->get('/login', 'Auth::login');
$routes->post('/login', 'Auth::login_post');
$routes->get('/register', 'Auth::register');
$routes->post('/register', 'Auth::register_post');
$routes->get('/logout', 'Auth::logout');

$routes->get('/order/(:segment)', 'Order::index/$1', ['filter' => 'isLogin']);
$routes->post('/order/(:segment)', 'Order::order_insert/$1', ['filter' => 'isLogin']);

$routes->get('/myorders', 'Order::my_orders', ['filter' => 'isLogin']);
$routes->get('/invoice/(:segment)', 'Export::invoice/$1', ['filter' => 'isLogin']);

$routes->get('/dashboard', 'Dashboard::index', ['filter' => 'isLogin', 'filter' => 'isAdmin']);

$routes->get('/dashboard/cars', 'Cars::list', ['filter' => 'isLogin', 'filter' => 'isAdmin']);
$routes->get('/dashboard/cars/add', 'Cars::add', ['filter' => 'isLogin', 'filter' => 'isAdmin']);
$routes->post('/dashboard/cars/add', 'Cars::add_insert', ['filter' => 'isLogin', 'filter' => 'isAdmin']);
$routes->get('/dashboard/cars/(:segment)', 'Cars::edit/$1', ['filter' => 'isLogin', 'filter' => 'isAdmin']);
$routes->post('/dashboard/cars/(:segment)', 'Cars::edit_save/$1', ['filter' => 'isLogin', 'filter' => 'isAdmin']);
$routes->get('/dashboard/cars/delete/(:segment)', 'Cars::delete/$1', ['filter' => 'isLogin', 'filter' => 'isAdmin']);

$routes->get('/dashboard/types', 'Types::list', ['filter' => 'isLogin', 'filter' => 'isAdmin']);
$routes->get('/dashboard/types/add', 'Types::add', ['filter' => 'isLogin', 'filter' => 'isAdmin']);
$routes->post('/dashboard/types/add', 'Types::add_insert', ['filter' => 'isLogin', 'filter' => 'isAdmin']);
$routes->get('/dashboard/types/(:segment)', 'Types::edit/$1', ['filter' => 'isLogin', 'filter' => 'isAdmin']);
$routes->post('/dashboard/types/(:segment)', 'Types::edit_save/$1', ['filter' => 'isLogin', 'filter' => 'isAdmin']);
$routes->get('/dashboard/types/delete/(:segment)', 'Types::delete/$1', ['filter' => 'isLogin', 'filter' => 'isAdmin']);

$routes->get('/dashboard/orders', 'Orders::list', ['filter' => 'isLogin', 'filter' => 'isAdmin']);
$routes->get('/dashboard/orders/reject/(:segment)', 'Orders::reject/$1', ['filter' => 'isLogin', 'filter' => 'isAdmin']);
$routes->get('/dashboard/orders/accept/(:segment)', 'Orders::accept/$1', ['filter' => 'isLogin', 'filter' => 'isAdmin']);
$routes->get('/dashboard/orders/return/(:segment)', 'Orders::return/$1', ['filter' => 'isLogin', 'filter' => 'isAdmin']);
$routes->post('/dashboard/orders/return/(:segment)', 'Orders::return_post/$1', ['filter' => 'isLogin', 'filter' => 'isAdmin']);

$routes->get('/dashboard/orders/invoice/(:segment)', 'Export::invoice/$1', ['filter' => 'isLogin', 'filter' => 'isAdmin']);
$routes->get('/dashboard/exportex/cars', 'Export::excel_cars', ['filter' => 'isLogin', 'filter' => 'isAdmin']);
$routes->get('/dashboard/exportex/orders', 'Export::excel_orders', ['filter' => 'isLogin', 'filter' => 'isAdmin']);
$routes->get('/dashboard/exportpdf/cars', 'Export::pdf_cars', ['filter' => 'isLogin', 'filter' => 'isAdmin']);

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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
