<?php

namespace Config;

use App\Controllers\RoomCategoryController;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('AdminController');
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

// Auth Routes
$routes->group('', static function ($routes) {
    $routes->get('/', 'AuthController::index', ['as' => 'auth.login']);
    $routes->post('login', 'AuthController::index');
    $routes->get('logout', 'AuthController::logout', ['as' => 'auth.logout']);
});

// Admin Routes
$routes->group('admin', ['filter' => 'authGuard'], static function ($routes) {
    $routes->get('dashboard', 'DashboardController::index', ['as' => 'dashboard']);

    // Rooms
    $routes->get('rooms', 'RoomController::index', ['as' => 'room.list']);
    $routes->get('room/add', 'RoomController::add', ['as' => 'room.add']);

    // Room Category
    $routes->get('room-categories', 'RoomCategoryController::index', ['as' => 'rcategory.list']);
    $routes->match(['get', 'post'], 'room-category/add', 'RoomCategoryController::add', ['as' => 'rcategory.add']);
    $routes->match(['get', 'post'], 'room-category/edit/(:num)', 'RoomCategoryController::edit/$1', ['as' => 'rcategory.edit']);
    $routes->delete('room-category/delete/(:num)', 'RoomCategoryController::delete/$1', ['as' => 'rcategory.delete']);

    // Room Facility
    $routes->get('room-facilities', 'RoomFacilityController::index', ['as' => 'rfacility.list']);
    $routes->match(['get', 'post'], 'room-facility/add', 'RoomFacilityController::add', ['as' => 'rfacility.add']);
    $routes->match(['get', 'post'], 'room-facility/edit/(:num)', 'RoomFacilityController::edit/$1', ['as' => 'rfacility.edit']);
    $routes->delete('room-facility/delete/(:num)', 'RoomFacilityController::delete/$1', ['as' => 'rfacility.delete']);
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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
