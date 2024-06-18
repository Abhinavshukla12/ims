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
    $routes->group('sales_order/', ['namespace' => 'App\Controllers\ImsControllers\Inventary_transaction'], static function ($routes) {
        $routes->get('', 'sales_order::index');
        $routes->get('create', 'sales_order::create');
        $routes->post('store', 'sales_order::store');
        $routes->get('edit/(:num)', 'sales_order::edit/$1');
        $routes->post('update/(:num)', 'sales_order::update/$1');
        $routes->get('delete/(:num)', 'sales_order::delete/$1');
    });
    //purchase order page route
    $routes->group('purchase_order/', ['namespace' => 'App\Controllers\ImsControllers'], static function ($routes) {
        $routes->get('', 'Inventary_transaction\purchase_order::index');
    });

    //item management page route
    $routes->group('item_management/', ['namespace' => 'App\Controllers\ImsControllers'], static function ($routes) {
        $routes->get('', 'Inventary_tracking\item_management::index');
    });

    //supplier management page route
    $routes->group('supplier_database/', ['namespace' => 'App\Controllers\ImsControllers'], static function ($routes) {
        $routes->get('', 'supplier_database::index');
    });

    //warehouse management page route
    $routes->group('warehouse/', ['namespace' => 'App\Controllers\ImsControllers'], static function ($routes) {
        $routes->get('', 'WarehouseControllers\warehouse::index');
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