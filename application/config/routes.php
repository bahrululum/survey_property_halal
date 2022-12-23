<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'welcome/index';
$route['pertanyaan/(:any)']	 =  'welcome/pertanyaan/$1';
$route['terimakasih/(:any)'] =  'welcome/terimakasih/$1';
$route['informasi-referral/(:any)'] =  'welcome/referral_informasi/$1';
$route['isi-data/(:any)'] =  'welcome/isi_data/$1';	
$route['dashboard'] 		 = 'dashboard';
$route['login']				 = 'auth/login';	
$route['404_override'] 		 = 'welcome/error_halaman';
$route['master-pertanyaan']  = 'master/data_pertanyaan';
$route['data-survei']		 = 'master/data_survei';
$route['data-survei-detail/(:any)'] = 'master/data_detail_survei/$1';
$route['data-kenalan']		= 'master/data_kenalan';
$route['pengaturan-referral'] = 'master/pengaturan_referral';


$route['translate_uri_dashes'] = FALSE;
?>






