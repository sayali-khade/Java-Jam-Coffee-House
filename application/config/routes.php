<?php
defined('BASEPATH') OR exit('No direct script access allowed');




$route['order']='gears/placeyourorder';
$route['carts']='carts/index';
$route['gears']='gears/index';
$route['jobs']='jobs/index';
$route['musics']='musics/index';
$route['default_controller'] = 'pages/view';
$route['(:any)'] = 'pages/view/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
