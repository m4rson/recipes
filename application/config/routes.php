<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'users/login';
$route['home'] = 'site/index';
$route['register'] = 'users/create';
$route['login'] = 'users/login';
$route['logout'] = 'users/logout';
$route['admin'] = 'admins/login';
$route['AdminPanel'] = 'admins/panel';
$route['users'] = 'users/index';
$route['recipes/index'] = 'recipes/index';
$route['recipes/page/(:any)'] = 'recipes/index';
$route['recipes/new'] = 'recipes/add';
$route['categories/new'] = 'categories/add';
$route['recipes/show/(:any)'] = 'recipes/show';
$route['recipes/show/(:any)/(:any)'] = 'recipes/show';
$route['categories/show(:any)'] = 'categories/show';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
