<?php

namespace Config;

$routes = Services::routes();

//routes start
$routes->group('ims/', ['namespace' => 'App\Controllers\ImsControllers'], static function ($routes) {
    
    //home route
    $routes->get('home', 'Dashboard_controller::index');
    //stock in page route
    $routes->group('stock_in/', ['namespace' => 'App\Controllers\ImsControllers'], static function ($routes) {
        $routes->get('', 'Inventary_transaction\stock_in::index');
        $routes->get('stock_in_data', 'Inventary_transaction\stock_in::stock_in_data');
        $routes->post('crud_operations', 'Inventary_transaction\stock_in::crud_operations');
        $routes->post('add_user', 'Inventary_transaction\stock_in::add_user');
        $routes->post('edit_user', 'Inventary_transaction\stock_in::edit_user');
        $routes->post('delete_user', 'Inventary_transaction\stock_in::delete_user');
    });
    //sales order page route
    $routes->get('sales_order', 'Inventary_transaction\sales_order::index');
    //purchase order page route
    $routes->get('purchase_order', 'Inventary_transaction\purchase_order::index');
});
//routes end