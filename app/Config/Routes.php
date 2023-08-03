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

// $routes->get('/', 'Home::index',['filter' => 'auth']); ini cara non-group


//================USER=================//
$routes->get('/', 'Home::index');
$routes->get('/login-section', 'AuthController::index');
$routes->get('/logout-end', 'AuthController::logout');
$routes->get('/register', 'AuthController::register');
$routes->post('/login-post', 'AuthController::postLogin');
$routes->post('/register', 'AuthController::postRegister');
//route middlerware
$routes->get('/dashboard', 'Home::index',['filter' => 'auth']);
$routes->get('/users-list-villa', 'Home::ListVilla',['filter' => 'auth']);
$routes->get('/detail/(:num)', 'Home::details/$1',['filter' => 'auth']);
$routes->get('/update-profile/(:num)', 'Home::updateProfile/$1',['filter' => 'auth']);
$routes->post('/post-update-profile/(:num)', 'Home::PostUpdate/$1',['filter' => 'auth']);
$routes->get('/update-password/(:num)', 'Home::updatePassword/$1',['filter' => 'auth']);
$routes->post('/post-update-password/(:num)', 'Home::PostUpdatePassword/$1',['filter' => 'auth']);
$routes->post('/user-booking-villa', 'Home::PostBooking',['filter' => 'auth']);
$routes->get('/checklist', 'Home::MyBooking',['filter' => 'auth']);
$routes->post('/user-search-villa', 'Home::SearchVilla',['filter' => 'auth']);
$routes->post('/user-search-villa-properties', 'Home::SearchVillaProperties',['filter' => 'auth']);


//================ADMIN================//
$routes->get('/login-section-admin', 'AuthController::adminLogin');
$routes->get('/logout-section-admin', 'AuthController::adminLogout');
$routes->post('/login-post-admin', 'AuthController::postLoginAdmin');

//route middlerware
$routes->get('/admin-dashboard', 'AdminController::home',['filter' => 'admin']);
$routes->get('/admin-insert', 'AdminController::Create',['filter' => 'admin']);
$routes->get('/admin-list-villa', 'AdminController::List',['filter' => 'admin']);
$routes->get('/admin-delete-villa/(:num)', 'AdminController::DeleteVilla/$1',['filter' => 'admin']);
$routes->get('/admin-edit-villa/(:num)', 'AdminController::UpdateVilla/$1',['filter' => 'admin']);
$routes->post('/admin-post-update-villa/(:num)', 'AdminController::PostUpdateVilla/$1',['filter' => 'admin']);

$routes->get('/admin-insert-features', 'AdminController::Features',['filter' => 'admin']);
$routes->get('/admin-insert-new-features/(:num)', 'AdminController::CreateFeatures/$1',['filter' => 'admin']);
$routes->get('/admin-delete-feature/(:num)', 'AdminController::DeleteFeatures/$1',['filter' => 'admin']);
$routes->get('/admin-edit-feature/(:num)', 'AdminController::EditFeatures/$1',['filter' => 'admin']);
$routes->post('/admin-post-features/(:num)', 'AdminController::PostFeatures/$1',['filter' => 'admin']);
$routes->post('/admin-post-update-feature/(:num)', 'AdminController::PostUpdateFeatures/$1',['filter' => 'admin']);

$routes->post('/admin-insert-new', 'AdminController::PostVilla',['filter' => 'admin']);
$routes->get('/admin-insert-content', 'AdminController::Content',['filter' => 'admin']);
$routes->get('/admin-insert-new-content/(:num)', 'AdminController::CreateContent/$1',['filter' => 'admin']);
$routes->get('/admin-view-details/(:num)', 'AdminController::Details/$1',['filter' => 'admin']);
$routes->get('/admin-delete-content/(:num)', 'AdminController::DeleteContent/$1',['filter' => 'admin']);
$routes->get('/admin-edit-content/(:num)', 'AdminController::EditContent/$1',['filter' => 'admin']);
$routes->post('/admin-post-content/(:num)', 'AdminController::PostContent/$1',['filter' => 'admin']);
$routes->post('/admin-post-update-content-villa/(:num)', 'AdminController::PostUpdateContent/$1',['filter' => 'admin']);

$routes->get('/admin-update-profile/(:num)', 'AdminController::UpdateProfile/$1',['filter' => 'admin']);
$routes->post('/post-admin-update-profile/(:num)', 'AdminController::PostUpdateProfile/$1',['filter' => 'admin']);
$routes->get('/admin-update-password/(:num)', 'AdminController::UpdatePassword/$1',['filter' => 'admin']);
$routes->post('/post-admin-update-password/(:num)', 'AdminController::PostUpdatePassword/$1',['filter' => 'admin']);
$routes->get('/admin-list-booked', 'AdminController::ListBookedVilla',['filter' => 'admin']);
$routes->get('/admin-confirm-booking/(:num)', 'AdminController::ConfirmBooking/$1',['filter' => 'admin']);
$routes->get('/admin-reject-booking/(:num)', 'AdminController::RejectBooking/$1',['filter' => 'admin']);
$routes->post('/admin-change-status/(:num)', 'AdminController::ChangeStatus/$1',['filter' => 'admin']);
$routes->get('/admin-check-detail-booking/(:num)', 'AdminController::DetailBookedVilla/$1',['filter' => 'admin']);
$routes->get('/admin-delete-booking/(:num)', 'AdminController::DeleteBookedVilla/$1',['filter' => 'admin']);

// $routes->group('admin', ['filter' => 'auth'], function($routes) {
// });



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
