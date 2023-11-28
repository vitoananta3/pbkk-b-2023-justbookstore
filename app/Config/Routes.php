<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Page::index');

$routes->get('/books', 'Books::index');
$routes->get('/books/create', 'Books::create');
$routes->post('/books/save', 'Books::save');
$routes->get('/books/(:segment)', 'Books::detail/$1');  

$routes->get('/categories', 'Categories::index');
$routes->get('/categories/create', 'Categories::create');
$routes->post('/categories/save', 'Categories::save');
$routes->get('/categories/edit/(:segment)', 'Categories::edit/$1');
$routes->put('/categories/update/(:num)', 'Categories::update/$1');
$routes->delete('/categories/(:num)', 'Categories::delete/$1');
$routes->get('/categories/(:segment)', 'Categories::detail/$1');

$routes->get('/signin', 'Auth::signin');
$routes->post('/signin', 'Auth::signin');
$routes->get('/signup', 'Auth::signup');
$routes->post('/signup', 'Auth::signup');
