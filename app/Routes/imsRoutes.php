<?php

namespace Config;

$routes = Services::routes();

//routes start
$routes->group('ims/', ['namespace' => 'App\Controllers\ImsControllers'], static function ($routes) {
    
    //project by abhinav
    $routes->get('home', 'Dashboard_controller::index');

    $routes->get('stock_in', 'Inventary_transaction::stock_in');
});
//routes end 