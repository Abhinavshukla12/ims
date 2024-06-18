<?php

namespace Config;

$routes = Services::routes();

//routes start
$routes->group('ims/', ['namespace' => 'App\Controllers\ImsControllers'], static function ($routes) {
    
    //home route
    $routes->get('home', 'Dashboard_controller::index');
    //stock in page route
    $routes->group('stock/', ['namespace' => 'App\Controllers\ImsControllers\Inventary_transaction'], static function ($routes) {
        $routes->get('', 'stocks::index');
        $routes->get('create', 'stocks::create');
        $routes->post('store', 'stocks::store');
        $routes->get('edit/(:num)', 'stocks::edit/$1');
        $routes->post('update/(:num)', 'stocks::update/$1');
        $routes->get('delete/(:num)', 'stocks::delete/$1');
    });
    //sales order page route
    $routes->group('sales/', ['namespace' => 'App\Controllers\ImsControllers\Inventary_transaction'], static function ($routes) {
        $routes->get('', 'sales_order::index');
        $routes->get('create', 'sales_order::create');
        $routes->post('store', 'sales_order::store');
        $routes->get('edit/(:num)', 'sales_order::edit/$1');
        $routes->post('update/(:num)', 'sales_order::update/$1');
        $routes->get('delete/(:num)', 'sales_order::delete/$1');
    });
    //purchase order page route
    $routes->group('purchase_order/', ['namespace' => 'App\Controllers\ImsControllers\Inventary_transaction'], static function ($routes) {
        $routes->get('', 'PurchaseController::index');
        $routes->get('create', 'PurchaseController::create');
        $routes->post('store', 'PurchaseController::store');
        $routes->get('edit/(:num)', 'PurchaseController::edit/$1');
        $routes->post('update/(:num)', 'PurchaseController::update/$1');
        $routes->get('delete/(:num)', 'PurchaseController::delete/$1');
    });

    //item management page route
    $routes->group('item_management/', ['namespace' => 'App\Controllers\ImsControllers\Inventary_tracking'], static function ($routes) {
        $routes->get('', 'ItemsController::index');
        $routes->get('create', 'ItemsController::create');
        $routes->post('store', 'ItemsController::store');
        $routes->get('edit/(:num)', 'ItemsController::edit/$1');
        $routes->post('update/(:num)', 'ItemsController::update/$1');
        $routes->get('delete/(:num)', 'ItemsController::delete/$1');

    });

    //supplier management page route
    $routes->group('suppliers/', ['namespace' => 'App\Controllers\ImsControllers\SupplierControllers'], static function ($routes) {
        $routes->get('', 'SuppliersController::index');
        $routes->get('create', 'SuppliersController::create');
        $routes->post('store', 'SuppliersController::store');
        $routes->get('edit/(:num)', 'SuppliersController::edit/$1');
        $routes->post('update/(:num)', 'SuppliersController::update/$1');
        $routes->get('delete/(:num)', 'SuppliersController::delete/$1');
    });

    //warehouse management page route
    $routes->group('warehouse/', ['namespace' => 'App\Controllers\ImsControllers\WarehouseControllers'], static function ($routes) {
        $routes->get('', 'WarehousesController::index');
        $routes->get('create', 'WarehousesController::create');
        $routes->post('store', 'WarehousesController::store');
        $routes->get('edit/(:num)', 'WarehousesController::edit/$1');
        $routes->post('update/(:num)', 'WarehousesController::update/$1');
        $routes->get('delete/(:num)', 'WarehousesController::delete/$1');
    });

    //document management page route
    $routes->group('document/', ['namespace' => 'App\Controllers\ImsControllers'], static function ($routes) {
        $routes->get('', 'DocumentController\document::index');
    });

    $routes->get('about', 'AboutControllers\about::index');
    $routes->get('categories', 'CategoriesControllers\categories::index');
    $routes->get('contact', 'ContactControllers\contact::index');

    $routes->get('settings', 'SettingsControllers\settings::index');
});
//routes end