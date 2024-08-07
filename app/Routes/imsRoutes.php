<?php

namespace Config;

$routes = Services::routes();

//group routes start
$routes->group('ims/', ['namespace' => 'App\Controllers\ImsControllers'], static function ($routes) {

    //reigster an account routes
    $routes->get('register', 'AuthController::register');
    $routes->post('register', 'AuthController::processRegister');

    //login user routes
    $routes->get('login', 'AuthController::login');
    $routes->post('login', 'AuthController::processLogin');

    //logut user routes
    $routes->get('logout', 'AuthController::logout');

    //profile page routes
    $routes->get('profile', 'AuthController::profile');

    //change username routes
    $routes->get('change_username', 'AuthController::changeUsername');
    $routes->post('change_username', 'AuthController::processChangeUsername');

    //change password routes
    $routes->get('change_password', 'AuthController::changePassword');
    $routes->post('change_password', 'AuthController::changePassword');

    //change number routes
    $routes->get('change_number', 'AuthController::change_number');
    $routes->post('updatePhoneNumber', 'AuthController::updatePhoneNumber');

    //delete account routes
    $routes->post('delete_account', 'AuthController::deleteAccount');

    //switch account routes
    $routes->get('switch_account', 'AuthController::switchAccount');

    //home page routes
    $routes->get('home', 'DashboardController::index');

    //about page routes
    $routes->get('about', 'AboutController::index');
    
    //stock page routes
    $routes->group('stock/', ['namespace' => 'App\Controllers\ImsControllers'], static function ($routes) {
        $routes->get('', 'StockController::jqgrid');
        $routes->get('stock_data', 'StockController::stock_data');
        $routes->post('crud_operations', 'StockController::crud_operations');
        $routes->post('add', 'StockController::add');
        $routes->post('edit', 'StockController::edit');
        $routes->post('delete', 'StockController::delete');
        $routes->get('stock_graph', 'GraphController::stock_graph');
    });

    //sales order page routes
    $routes->group('sales/', ['namespace' => 'App\Controllers\ImsControllers'], static function ($routes) {
        $routes->get('', 'SalesController::jqgrid');
        $routes->get('sales_data', 'SalesController::sales_data');
        $routes->post('crud_operations', 'SalesController::crud_operations');
        $routes->post('add', 'SalesController::add');
        $routes->post('edit', 'SalesController::edit');
        $routes->post('delete', 'SalesController::delete');
        $routes->get('sales_graph', 'GraphController::sales_graph');
    });

    //purchase order page routes
    $routes->group('purchase_order/', ['namespace' => 'App\Controllers\ImsControllers'], static function ($routes) {
        $routes->get('', 'PurchaseController::jqgrid');
        $routes->get('purchase_data', 'PurchaseController::purchase_data');
        $routes->post('crud_operations', 'PurchaseController::crud_operations');
        $routes->post('add', 'PurchaseController::add');
        $routes->post('edit', 'PurchaseController::edit');
        $routes->post('delete', 'PurchaseController::delete');
        $routes->get('purchase_graph', 'GraphController::purchase_graph');
    });

    //item management page routes
    $routes->group('item_management/', ['namespace' => 'App\Controllers\ImsControllers'], static function ($routes) {
        $routes->get('', 'ItemsController::jqgrid');
        $routes->get('item_data', 'ItemsController::item_data');
        $routes->post('crud_operations', 'ItemsController::crud_operations');
        $routes->post('add', 'ItemsController::add');
        $routes->post('edit', 'ItemsController::edit');
        $routes->post('delete', 'ItemsController::delete');
        $routes->get('items_graph', 'GraphController::items_graph');
    });

    //supplier management page routes
    $routes->group('suppliers/', ['namespace' => 'App\Controllers\ImsControllers'], static function ($routes) {
        $routes->get('', 'SuppliersController::jqgrid');
        $routes->get('suppliers_data', 'SuppliersController::suppliers_data');
        $routes->post('crud_operations', 'SuppliersController::crud_operations');
        $routes->post('add', 'SuppliersController::add');
        $routes->post('edit', 'SuppliersController::edit');
        $routes->post('delete', 'SuppliersController::delete');
    });

    //warehouse management page routes
    $routes->group('warehouse/', ['namespace' => 'App\Controllers\ImsControllers'], static function ($routes) {
        $routes->get('', 'WarehousesController::jqgrid');
        $routes->get('warehouse_data', 'WarehousesController::warehouse_data');
        $routes->post('crud_operations', 'WarehousesController::crud_operations');
        $routes->post('add', 'WarehousesController::add');
        $routes->post('edit', 'WarehousesController::edit');
        $routes->post('delete', 'WarehousesController::delete');
    });

    //document management page routes
    $routes->group('document/', ['namespace' => 'App\Controllers\ImsControllers'], static function ($routes) {
        $routes->get('', 'DocumentsController::jqgrid');
        $routes->get('document_data', 'DocumentsController::document_data');
        $routes->post('crud_operations', 'DocumentsController::crud_operations');
        $routes->post('add', 'DocumentsController::add');
        $routes->post('edit', 'DocumentsController::edit');
        $routes->post('delete', 'DocumentsController::delete');
    });

    //employees management page routes
    $routes->group('employee/', ['namespace' => 'App\Controllers\ImsControllers'], static function ($routes) {
        $routes->get('', 'EmployeeController::jqgrid');
        $routes->get('employee_data', 'EmployeeController::employee_data');
        $routes->post('crud_operations', 'EmployeeController::crud_operations');
        $routes->post('add', 'EmployeeController::add');
        $routes->post('edit', 'EmployeeController::edit');
        $routes->post('delete', 'EmployeeController::delete');
    });
});
//group routes end