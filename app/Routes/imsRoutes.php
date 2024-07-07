<?php

namespace Config;

$routes = Services::routes();

//routes start
$routes->group('ims/', ['namespace' => 'App\Controllers\ImsControllers'], static function ($routes) {

    //reigster an account route
    $routes->get('register', 'AuthController::register');
    $routes->post('register', 'AuthController::processRegister');

    //login user route
    $routes->get('login', 'AuthController::login');
    $routes->post('login', 'AuthController::processLogin');

    //logut user route
    $routes->get('logout', 'AuthController::logout');

    //profile page route
    $routes->get('profile', 'AuthController::profile');

    //change username route
    $routes->get('change_username', 'AuthController::changeUsername');
    $routes->post('change_username', 'AuthController::processChangeUsername');

    //change password route
    $routes->get('change_password', 'AuthController::changePassword');
    $routes->post('change_password', 'AuthController::changePassword');

    //change number route
    $routes->get('change_number', 'AuthController::change_number');
    $routes->post('updatePhoneNumber', 'AuthController::updatePhoneNumber');

    //delete account route
    $routes->post('delete_account', 'AuthController::deleteAccount');

    //home page route
    $routes->get('home', 'Dashboard_controller::index');

    //about page route
    $routes->get('about', 'about::index');

    //contact page route
    $routes->get('contact', 'contact::index');
    
    //stock page route
    $routes->group('stock/', ['namespace' => 'App\Controllers\ImsControllers'], static function ($routes) {
        $routes->get('', 'stocks::jqgrid');
        $routes->get('stock_data', 'stocks::stock_data');
        $routes->post('crud_operations', 'stocks::crud_operations');
        $routes->post('add', 'stocks::add');
        $routes->post('edit', 'stocks::edit');
        $routes->post('delete', 'stocks::delete');
        $routes->get('stock_graph', 'GraphController::stock_graph');
    });

    //sales order page route
    $routes->group('sales/', ['namespace' => 'App\Controllers\ImsControllers'], static function ($routes) {
        $routes->get('', 'sales_order::jqgrid');
        $routes->get('sales_data', 'sales_order::sales_data');
        $routes->post('crud_operations', 'sales_order::crud_operations');
        $routes->post('add', 'sales_order::add');
        $routes->post('edit', 'sales_order::edit');
        $routes->post('delete', 'sales_order::delete');
        $routes->get('sales_graph', 'GraphController::sales_graph');
    });

    //purchase order page route
    $routes->group('purchase_order/', ['namespace' => 'App\Controllers\ImsControllers'], static function ($routes) {
        $routes->get('', 'PurchaseController::jqgrid');
        $routes->get('purchase_data', 'PurchaseController::purchase_data');
        $routes->post('crud_operations', 'PurchaseController::crud_operations');
        $routes->post('add', 'PurchaseController::add');
        $routes->post('edit', 'PurchaseController::edit');
        $routes->post('delete', 'PurchaseController::delete');
        $routes->get('purchase_graph', 'GraphController::purchase_graph');
    });

    //item management page route
    $routes->group('item_management/', ['namespace' => 'App\Controllers\ImsControllers'], static function ($routes) {
        $routes->get('', 'ItemsController::jqgrid');
        $routes->get('item_data', 'ItemsController::item_data');
        $routes->post('crud_operations', 'ItemsController::crud_operations');
        $routes->post('add', 'ItemsController::add');
        $routes->post('edit', 'ItemsController::edit');
        $routes->post('delete', 'ItemsController::delete');
        $routes->get('items_graph', 'GraphController::items_graph');
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

    //employees management page route
    $routes->group('employee/', ['namespace' => 'App\Controllers\ImsControllers'], static function ($routes) {
        $routes->get('', 'EmployeeController::jqgrid');
        $routes->get('employee_data', 'EmployeeController::employee_data');
        $routes->post('crud_operations', 'EmployeeController::crud_operations');
        $routes->post('add', 'EmployeeController::add');
        $routes->post('edit', 'EmployeeController::edit');
        $routes->post('delete', 'EmployeeController::delete');
    });
});
//routes end