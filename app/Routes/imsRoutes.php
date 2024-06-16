<?php

namespace Config;

$routes = Services::routes();

//routes start
$routes->group('ims/', ['namespace' => 'App\Controllers\ImsControllers'], static function ($routes) {
    
    //home route
    $routes->get('home', 'Dashboard_controller::index');
    //stock in page route
    $routes->group('stocks/', ['namespace' => 'App\Controllers\ImsControllers'], static function ($routes) {
        $routes->get('', 'Inventary_transaction\stocks::index');
        $routes->get('stocks_data', 'Inventary_transaction\stocks::stocks_data');
        $routes->post('crud_operations', 'Inventary_transaction\stocks::crud_operations');
        $routes->post('add_user', 'Inventary_transaction\stocks::add_user');
        $routes->post('edit_user', 'Inventary_transaction\stocks::edit_user');
        $routes->post('delete_user', 'Inventary_transaction\stocks::delete_user');
    });
    //sales order page route
    $routes->group('sales_order/', ['namespace' => 'App\Controllers\ImsControllers'], static function ($routes) {
        $routes->get('', 'Inventary_transaction\sales_order::index');
        $routes->get('sales_order_data', 'Inventary_transaction\sales_order::sales_order_data');
        $routes->post('crud_operations', 'Inventary_transaction\sales_order::crud_operations');
        $routes->post('add_user', 'Inventary_transaction\sales_order::add_user');
        $routes->post('edit_user', 'Inventary_transaction\sales_order::edit_user');
        $routes->post('delete_user', 'Inventary_transaction\sales_order::delete_user');
    });
    //purchase order page route
    $routes->group('purchase_order/', ['namespace' => 'App\Controllers\ImsControllers'], static function ($routes) {
        $routes->get('', 'Inventary_transaction\purchase_order::index');
        $routes->get('purchase_order_data', 'Inventary_transaction\purchase_order::purchase_order_data');
        $routes->post('crud_operations', 'Inventary_transaction\purchase_order::crud_operations');
        $routes->post('add_user', 'Inventary_transaction\purchase_order::add_user');
        $routes->post('edit_user', 'Inventary_transaction\purchase_order::edit_user');
        $routes->post('delete_user', 'Inventary_transaction\purchase_order::delete_user');
    });

    //item management page route
    $routes->group('item_management/', ['namespace' => 'App\Controllers\ImsControllers'], static function ($routes) {
        $routes->get('', 'Inventary_tracking\item_management::index');
        $routes->get('item_management_data', 'Inventary_tracking\item_management::item_management_data');
        $routes->post('crud_operations', 'Inventary_tracking\item_management::crud_operations');
        $routes->post('add_user', 'Inventary_tracking\item_management::add_user');
        $routes->post('edit_user', 'Inventary_tracking\item_management::edit_user');
        $routes->post('delete_user', 'Inventary_tracking\item_management::delete_user');
    });

    //supplier management page route
    $routes->group('supplier_database/', ['namespace' => 'App\Controllers\ImsControllers'], static function ($routes) {
        $routes->get('', 'supplier_database::index');
        $routes->get('supplier_database_data', 'supplier_database::supplier_database_data');
        $routes->post('crud_operations', 'supplier_database::crud_operations');
        $routes->post('add_user', 'supplier_database::add_user');
        $routes->post('edit_user', 'supplier_database::edit_user');
        $routes->post('delete_user', 'supplier_database::delete_user');
    });

    //warehouse management page route
    $routes->group('warehouse/', ['namespace' => 'App\Controllers\ImsControllers'], static function ($routes) {
        $routes->get('', 'WarehouseControllers\warehouse::index');
        $routes->get('warehouse_data', 'WarehouseControllers\warehouse::warehouse_data');
        $routes->post('crud_operations', 'WarehouseControllers\warehouse::crud_operations');
        $routes->post('add', 'WarehouseControllers\warehouse::add');
        $routes->post('edit', 'WarehouseControllers\warehouse::edit');
        $routes->post('delete', 'WarehouseControllers\warehouse::delete');
    });

    //document management page route
    $routes->group('document/', ['namespace' => 'App\Controllers\ImsControllers'], static function ($routes) {
        $routes->get('', 'DocumentController\document::index');
        $routes->get('document_data', 'DocumentController\document::document_data');
        $routes->post('crud_operations', 'DocumentController\document::crud_operations');
        $routes->post('add', 'DocumentController\document::add');
        $routes->post('edit', 'DocumentController\document::edit');
        $routes->post('delete', 'DocumentController\document::delete');
    });

    $routes->get('about', 'AboutControllers\about::index');
    $routes->get('categories', 'CategoriesControllers\categories::index');
    $routes->get('contact', 'ContactControllers\contact::index');
    $routes->post('submit', 'ContactControllers\contact::submit');

    $routes->get('settings', 'SettingsControllers\settings::index');
});
//routes end