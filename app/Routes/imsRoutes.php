<?php

namespace Config;

$routes = Services::routes();

//routes start
$routes->group('ims/', ['namespace' => 'App\Controllers\ImsControllers'], static function ($routes) {
    
    //home route
    $routes->get('home', 'Dashboard_controller::index');
    //stock in page route
    $routes->get('stock_in', 'Inventary_transaction\stock_in::index');
    //stock out page route
    $routes->get('stock_out', 'Inventary_transaction\stock_out::index');
    //sales order page route
    $routes->get('sales_order', 'Inventary_transaction\sales_order::index');
    //purchase order page route
    $routes->get('purchase_order', 'Inventary_transaction\purchase_order::index');
});
//routes end