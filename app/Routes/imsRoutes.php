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
    $routes->get('sales_order', 'Inventary_transaction\sales_order::index');
    //purchase order page route
    $routes->get('purchase_order', 'Inventary_transaction\purchase_order::index');
});
//routes end