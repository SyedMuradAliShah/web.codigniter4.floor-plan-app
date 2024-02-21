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
$routes->setDefaultController('Welcome');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override('App\Controllers\Welcome::error_404');
$routes->setPrioritize();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */
$routes->get('/migrate', 'Migrate::index');
$routes->get('/migrate/seed', 'Migrate::seed');

$routes->get('/', 'Welcome::index');

$routes->addRedirect('/adminino', 'adminino/login', 301);

$routes->group('adminino', ['filter' => 'admin_noauth'], static function ($routes) {
    $routes->match(['get', 'post'], 'login', 'Admin\AdminController::login', ['as' => 'admin_login']);
    $routes->match(['get', 'post'], 'forgot_password', 'Admin\AdminController::forgot_password', ['as' => 'admin_forgot_password']);
    $routes->match(['get', 'post'], 'reset_password_now/(:any)', 'Admin\AdminController::reset_password_now/$1');
});

$routes->group('adminino', ['filter' => 'admin_auth'], static function ($routes) {
    $routes->get('dashboard', 'Admin\AdminController::dashboard', ['as' => 'admin_dashboard']);

    $routes->get('admins', 'Admin\AdminController::admins', ['as' => 'admin_admins']);
    $routes->match(['get', 'post'], 'admins/new', 'Admin\AdminController::admin_add');
    $routes->match(['get', 'post'], 'admins/edit/(:num)', 'Admin\AdminController::admin_edit/$1');
    $routes->match(['get', 'post'], 'profile', 'Admin\AdminController::myprofile', ['as' => 'admin_profile']);

    $routes->get('roles', 'Admin\AdminController::admin_roles', ['as' => 'admin_roles']);
    $routes->match(['get', 'post'], 'roles/new', 'Admin\AdminController::admin_role_add');
    $routes->match(['get', 'post'], 'roles/edit/(:num)', 'Admin\AdminController::admin_role_edit/$1');

    $routes->get('categories', 'Admin\CategoryController::index', ['as' => 'admin_category']);
    $routes->match(['get', 'post'], 'categories/new', 'Admin\CategoryController::add', ['as' => 'admin_category_add']);
    $routes->match(['get', 'post'], 'categories/edit/(:num)', 'Admin\CategoryController::edit/$1', ['as' => 'admin_category_edit']);
    // $routes->post('categories/delete/(:num)', 'Admin\CategoryController::delete/$1', ['as' => 'admin_category_delete']);

    $routes->get('category-images', 'Admin\CategoryImageController::index', ['as' => 'admin_category_images']);
    $routes->match(['get', 'post'], 'category-images/new', 'Admin\CategoryImageController::add', ['as' => 'admin_category_image_add']);
    $routes->match(['get', 'post'], 'category-images/edit/(:num)', 'Admin\CategoryImageController::edit/$1', ['as' => 'admin_category_image_edit']);
    $routes->post('category-images/delete/(:num)', 'Admin\CategoryImageController::delete/$1', ['as' => 'admin_category_image_delete']);


    $routes->match(['get', 'post'], 'settings', 'Admin\AdminController::settings', ['as' => 'admin_settings']);
    $routes->get('logout', 'Admin\AdminController::logout', ['as' => 'admin_logout']);
});


// API Routes
$routes->get('api/categories', 'Api\CategoryController::index');
$routes->get('api/categories/(:num)', 'Api\CategoryController::show/$1');

$routes->get('api/category-images', 'Api\CategoryImageController::index');
$routes->get('api/category-images/(:num)', 'Api\CategoryImageController::show/$1');




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
