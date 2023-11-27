<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Page::index');

$routes->get('/books', 'Books::index');
$routes->get('/books/(:segment)', 'Books::detail/$1');  

$routes->get('/signin', 'Auth::signin');
$routes->post('/signin', 'Auth::signin');
$routes->get('/signup', 'Auth::signup');
$routes->post('/signup', 'Auth::signup');
