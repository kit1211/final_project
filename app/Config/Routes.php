<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index',['filter' => 'authGuard']);
$routes->group('/home', ['filter' => 'authGuard'], function($routes) {
    $routes->get('customer', 'Home::customer');
    $routes->get('pos', 'Home::pos');
    $routes->get('product', 'Home::product');
    $routes->get('billing', 'Home::billing');
});
