<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
//$route['news/(:any)'] = 'news/view/$1';
//$route['news'] = 'news';
$route['login/(:any)'] = 'auth/login/$1';
$route['login'] = 'auth/login';

$route['order/submit']['post'] = 'cart/submit';
$route['order/item/add/(:any)']['post'] = 'cart/add/$1';
$route['order/item/set/(:any)/(:any)']['post'] = 'cart/set/$1/$2';
$route['order/item/set/(:any)/(:any)']['put'] = 'cart/update/$1/$2';
$route['order/item/set/(:any)']['delete'] = 'cart/delete/$1';
$route['order/item/remove/(:any)'] = 'cart/remove/$1';

$route['order'] = 'order/main';
$route['order/dept/(:any)'] = 'order/dept/$1';
$route['order/dept/(:any)/cat/(:any)'] = 'order/cat/$1/$2';

$route['form/(:num)'] = 'form/main/$1';
$route['form'] = 'form/main';

$route['phonebook/(:num)'] = 'phonebook/main/$1';
$route['phonebook'] = 'phonebook/main';

$route['report'] = 'report/main';

$route['notice/(:num)'] = 'pages/notice/$1';
$route['notice'] = 'pages/notice';
$route['default_controller'] = 'Auth/login';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
