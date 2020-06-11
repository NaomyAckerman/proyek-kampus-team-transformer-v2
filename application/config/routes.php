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
$route['default_controller'] = 'Home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['login'] = 'Auth/login';
$route['login_admin'] = 'Auth/login_admin';
$route['logout'] = 'Auth/logout';
$route['registrasi'] = 'Auth/registrasi';
$route['lupapassword'] = 'Auth/lupapassword';

$route['keranjang'] = 'Home/keranjang';
$route['notifikasi'] = 'Home/notifikasi';
$route['bestseller'] = 'Home/bestseller';
$route['testimoni'] = 'Home/testimoni';
$route['uploadtesti'] = 'Home/uploadtesti';
$route['updatestok'] = 'Home/updatestok';
$route['konfirmasi'] = 'Home/konfirmasi';
$route['akun'] = 'Home/akun';

$route['dashboard'] = 'Admin/dashboard';
$route['admin_akun'] = 'Admin/admin_akun';
$route['input_akun'] = 'Admin/input_akun';
$route['profile'] = 'Admin/profile';
$route['admin_produk'] = 'Admin/admin_produk';
$route['input_produk'] = 'Admin/input_produk';
$route['admin_testimoni'] = 'Admin/admin_testimoni';
$route['admin_transaksi'] = 'Admin/admin_transaksi';
$route['admin_customer'] = 'Admin/admin_customer';
$route['admin_kategori_produk'] = 'Admin/admin_kategori_produk';
$route['input_kategori_produk'] = 'Admin/input_kategori_produk';