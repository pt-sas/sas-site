<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
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

//Frontend
$routes->get('/', 'MainController::index');
$routes->get('/en', 'Language::en');
$routes->get('/id', 'Language::id');

$routes->get('/product', 'MainController::product');
$routes->get('/product/compare', 'MainController::productcompare');
$routes->get('/product/(:any)', 'MainController::productdetail/$1');

$routes->get('/about', 'MainController::about');

$routes->get('/news', 'MainController::news');
$routes->get('/news/(:any)', 'MainController::newsdetail/$1');
$routes->get('/event/(:any)', 'MainController::promodetail/$1');

$routes->get('/career', 'MainController::career');

$routes->get('/contact', 'MainController::contact');
$routes->get('/create', 'MainController::create');
$routes->get('/check', 'MainController::check');


//Backend
$routes->get('auth', 'Backend/Auth::index', ['filter' => 'auth']);

$routes->get('logout', 'Backend\Auth::logout');

$routes->group('panel', ['filter' => 'auth'], function ($routes) {
	$routes->add('/', 'Backend\Dashboard::index');
	$routes->add('about', 'Backend\About::index');
	$routes->add('product', 'Backend\Product::index');
	$routes->add('principal', 'Backend\Principal::index');
	$routes->add('menu', 'Backend\Menu::index');
	$routes->add('submenu', 'Backend\Submenu::index');
	$routes->add('visitor', 'Backend\Visitor::index');
	$routes->add('role', 'Backend\Role::index');
	$routes->add('location', 'Backend\Location::index');
	$routes->add('user', 'Backend\User::index');
	$routes->add('event', 'Backend\Event::index');
	$routes->add('job', 'Backend\Job::index');
	$routes->add('news', 'Backend\News::index');
	$routes->add('division', 'Backend\Division::index');
});


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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
