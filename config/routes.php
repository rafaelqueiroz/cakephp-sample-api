<?php
/**
 * Routes configuration
 *
 */
use Cake\Core\Plugin;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;

Router::defaultRouteClass(DashedRoute::class);

Router::scope('/', function (RouteBuilder $routes) {

    $routes->connect('/', ['controller' => 'Recipes', 'action' => 'index']);

    $routes->resources('Recipes');
    $routes->resources('Users', ['only' => ['create']]);

    $routes->fallbacks(DashedRoute::class);
});

Plugin::routes();
