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
    $routes->get('change-password', 'AuthController::changePassword');
    $routes->post('change-password', 'AuthController::changePassword');

    //home route
    $routes->get('home', 'Dashboard_controller::index');
    $routes->get('about', 'about::index');
    $routes->get('contact', 'contact::index');
    
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
        $routes->get('', 'ItemsController::jqgrid');
        $routes->get('item_data', 'ItemsController::item_data');
        $routes->post('crud_operations', 'ItemsController::crud_operations');
        $routes->post('add', 'ItemsController::add');
        $routes->post('edit', 'ItemsController::edit');
        $routes->post('delete', 'ItemsController::delete');
    });

    //supplier management page route
    $routes->group('suppliers/', ['namespace' => 'App\Controllers\ImsControllers'], static function ($routes) {
        $routes->get('', 'SuppliersController::jqgrid');
        $routes->get('suppliers_data', 'SuppliersController::suppliers_data');
        $routes->post('crud_operations', 'SuppliersController::crud_operations');
        $routes->post('add', 'SuppliersController::add');
        $routes->post('edit', 'SuppliersController::edit');
        $routes->post('delete', 'SuppliersController::delete');
    });

    //warehouse management page route
    $routes->group('warehouse/', ['namespace' => 'App\Controllers\ImsControllers'], static function ($routes) {
        $routes->get('', 'WarehousesController::jqgrid');
        $routes->get('warehouse_data', 'WarehousesController::warehouse_data');
        $routes->post('crud_operations', 'WarehousesController::crud_operations');
        $routes->post('add', 'WarehousesController::add');
        $routes->post('edit', 'WarehousesController::edit');
        $routes->post('delete', 'WarehousesController::delete');
    });

    //document management page route
    $routes->group('document/', ['namespace' => 'App\Controllers\ImsControllers'], static function ($routes) {
        $routes->get('', 'DocumentsController::jqgrid');
        $routes->get('document_data', 'DocumentsController::document_data');
        $routes->post('crud_operations', 'DocumentsController::crud_operations');
        $routes->post('add', 'DocumentsController::add');
        $routes->post('edit', 'DocumentsController::edit');
        $routes->post('delete', 'DocumentsController::delete');
    });
});
//routes end