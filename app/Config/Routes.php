<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'home::index',['filter' => 'authGuard']);
$routes->group('/home', ['filter' => 'authGuard'], function($routes) {
    $routes->get('customer', 'home::customer');
    $routes->get('pos', 'home::pos');
    $routes->get('product', 'home::product');
    $routes->get('billing', 'home::billing');
});
