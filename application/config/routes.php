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
$route['default_controller'] = 'C_Login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


$route['Login'] = 'C_Login/index';
$route['Logout'] = 'C_Login/logout';
$route['Admin'] =  'Admin/C_Admin/index';
$route['Supplier'] = 'Supplier/C_Supplier/index';
$route['Pimpinan'] = 'Pimpinan/C_Pimpinan/index';

$route['Supplier/Laporan'] = 'Supplier/C_Supplier/tampilLaporan';
$route['Supplier/Register'] = 'C_Register';
$route['Supplier/aksi_register'] = 'C_Register/aksi_register';
$route['Supplier/approve'] = 'C_Register/approve';
$route['Admin/LaporanKeluar'] = 'Admin/C_Admin/tampilLaporanKeluar';

$route['Supplier/addBarang'] = 'Supplier/C_Supplier/aksi_tambah/'; 
$route['Admin/addBarang'] = 'Admin/C_Barang/aksi_tambah';
$route['Admin/addUser'] = 'Admin/C_Admin/aksi_tambah_user';
$route['Admin/addBarangKeluar'] = 'Admin/C_Admin/aksi_tambah_barangKeluar';

$route['Admin/KelolaBarang'] = 'Admin/C_Admin/tampilKelolaBarang';
$route['Admin/KelolaBarangKeluar'] = 'Admin/C_Admin/tampilBarangKeluar';
$route['Admin/KelolaUser'] = 'Admin/C_Admin/kelolaUser';
$route['Admin/KelolaBarangMasuk'] = 'Admin/C_Admin/tampilBarangMasuk';	
$route['Admin/tolakBarang/(:any)'] = 'Admin/C_Admin/tolakBarangMasuk/$1';
$route['Admin/terimaBarang/(:any)'] = 'Admin/C_Admin/terimaBarangMasuk/$1';
$route['Admin/Approve/(:any)'] = 'C_Register/approve/$1';
$route['Admin/hapusRegist/(:any)'] = 'C_Register/deny/$1';
$route['Pimpinan'] = 'Pimpinan/C_Pimpinan';
$route['Admin/AboutUs'] = 'Admin/C_Admin/tampilAboutUs';