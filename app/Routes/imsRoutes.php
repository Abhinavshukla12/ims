<?php

namespace Config;

$routes = Services::routes();

//routes start
$routes->group('ims/', ['namespace' => 'App\Controllers\ImsControllers'], static function ($routes) {
    $routes->get('register', 'AuthController::register');
    $routes->post('register', 'AuthController::processRegister');
    $routes->get('login', 'AuthController::login');
    $routes->post('login', 'AuthController::processLogin');
    $routes->get('logout', 'AuthController::logout');
    $routes->get('profile', 'AuthController::profile');

    //home route
    $routes->get('home', 'Dashboard_controller::index');
    $routes->get('about', 'about::index');
    $routes->get('contact', 'contact::index');
    $routes->get('settings', 'settings::index');
    
    //stock in page route
    $routes->group('stock/', ['namespace' => 'App\Controllers\ImsControllers'], static function ($routes) {
        $routes->get('', 'stocks::jqgrid');
        $routes->get('stock_data', 'stocks::stock_data');
        $routes->post('crud_operations', 'stocks::crud_operations');
        $routes->post('add', 'stocks::add');
        $routes->post('edit', 'stocks::edit');
        $routes->post('delete', 'stocks::delete');
    });

    //sales order page route
    $routes->group('sales/', ['namespace' => 'App\Controllers\ImsControllers'], static function ($routes) {
        $routes->get('', 'sales_order::jqgrid');
        $routes->get('sales_data', 'sales_order::sales_data');
        $routes->post('crud_operations', 'sales_order::crud_operations');
        $routes->post('add', 'sales_order::add');
        $routes->post('edit', 'sales_order::edit');
        $routes->post('delete', 'sales_order::delete');
    });

    //purchase order page route
    $routes->group('purchase_order/', ['namespace' => 'App\Controllers\ImsControllers'], static function ($routes) {
        $routes->get('', 'PurchaseController::jqgrid');
        $routes->get('purchase_data', 'PurchaseController::purchase_data');
        $routes->post('crud_operations', 'PurchaseController::crud_operations');
        $routes->post('add', 'PurchaseController::add');
        $routes->post('edit', 'PurchaseController::edit');
        $routes->post('delete', 'PurchaseController::delete');
    });

    //item management page route
    $routes->group('item_management/', ['namespace' => 'App\Controllers\ImsControllers'], static function ($routes) {
        $routes->get('', 'ItemsController::index');
        $routes->get('create', 'ItemsController::create');
        $routes->post('store', 'ItemsController::store');
        $routes->get('edit/(:num)', 'ItemsController::edit/$1');
        $routes->post('update/(:num)', 'ItemsController::update/$1');
        $routes->get('delete/(:num)', 'ItemsController::delete/$1');
    });

    //supplier management page route
    $routes->group('suppliers/', ['namespace' => 'App\Controllers\ImsControllers'], static function ($routes) {
        $routes->get('', 'SuppliersController::index');
        $routes->get('create', 'SuppliersController::create');
        $routes->post('store', 'SuppliersController::store');
        $routes->get('edit/(:num)', 'SuppliersController::edit/$1');
        $routes->post('update/(:num)', 'SuppliersController::update/$1');
        $routes->get('delete/(:num)', 'SuppliersController::delete/$1');
    });

    //warehouse management page route
    $routes->group('warehouse/', ['namespace' => 'App\Controllers\ImsControllers'], static function ($routes) {
        $routes->get('', 'WarehousesController::index');
        $routes->get('create', 'WarehousesController::create');
        $routes->post('store', 'WarehousesController::store');
        $routes->get('edit/(:num)', 'WarehousesController::edit/$1');
        $routes->post('update/(:num)', 'WarehousesController::update/$1');
        $routes->get('delete/(:num)', 'WarehousesController::delete/$1');
    });

    //document management page route
    $routes->group('document/', ['namespace' => 'App\Controllers\ImsControllers'], static function ($routes) {
        $routes->get('', 'DocumentsController::index');
        $routes->get('create', 'DocumentsController::create');
        $routes->post('store', 'DocumentsController::store');
        $routes->get('edit/(:num)', 'DocumentsController::edit/$1');
        $routes->post('update/(:num)', 'DocumentsController::update/$1');
        $routes->get('delete/(:num)', 'DocumentsController::delete/$1');
    });
});
//routes end