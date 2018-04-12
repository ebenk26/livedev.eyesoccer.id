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
$route['default_controller'] = 'home';
$route['sitemap\.xml'] = "sitemap";
$route['eyenews-sitemap\.xml'] = "eyenews_sitemap";
$route['eyetube-sitemap\.xml'] = "eyetube_sitemap";
$route['eyevent-sitemap\.xml'] = "eyevent_sitemap";
$route['eyeprofile-player_sitemap\.xml'] = "eyeprofile_player_sitemap";
$route['eyeprofile-club_sitemap\.xml'] = "eyeprofile_club_sitemap";
$route['eyeprofile-official_sitemap\.xml'] = "eyeprofile_official_sitemap";

$route['eyetube/kategori/Eye-Soccer-Flash'] 	= "eyetube/kategori/1";
$route['eyetube/kategori/Eye-Soccer-Funny'] 	= "eyetube/kategori/2";
$route['eyetube/kategori/Eye-Soccer-Hits'] 		= "eyetube/kategori/3";
$route['eyetube/kategori/VIDEO-KAMU'] 			= "eyetube/kategori/4";
$route['eyetube/kategori/Eyesoccerpedia'] 		= "eyetube/kategori/5";
$route['eyetube/kategori/Highlight'] 			= "eyetube/kategori/6";
$route['eyetube/kategori/Eyesoccer-History'] 	= "eyetube/kategori/7";
$route['eyetube/kategori/Eyesoccer-Fact-'] 		= "eyetube/kategori/8";
$route['eyetube/kategori/Eyesoccer-Profile'] 	= "eyetube/kategori/9";
$route['eyetube/kategori/Eyesoccer-Science'] 	= "eyetube/kategori/11";
$route['eyetube/kategori/Match-Preview'] 		= "eyetube/kategori/12";
$route['eyetube/kategori/SSB-/-Akademi'] 		= "eyetube/kategori/13";
$route['eyetube/kategori/Eyesoccer-Star'] 		= "eyetube/kategori/14";
$route['eyetube/kategori/Profile-SSB'] 			= "eyetube/kategori/15";
$route['tentang-kami'] 							= "home/tentang_kami";
$route['tim-eyesoccer'] 						= "home/tim_eyesoccer";
$route['pedoman-media-siber'] 					= "home/pedoman_media_siber";
$route['kebijakan-privasi'] 					= "home/kebijakan_privasi";
$route['panduan-komunitas'] 					= "home/panduan_komunitas";
$route['kontak'] 								= "home/kontak_kami";
$route['newsletter/eyetube'] 					= "home/newsletter/eyetube";
$route['newsletter/eyenews'] 					= "home/newsletter/eyenews";
$route['eyeprofile'] 							= "eyeprofile/klub";
$route['author/(:any)'] 							= "author/index/$1";

$route['eyetube/detail/ini-dia-wajah-baru-stadion-gelora-bung-karno-yang-menghabiskan-dana-760-miliar'] 	= "eyetube/detail/ini-dia-wajah-baru-sation-gelora-bung-karno-yang-menghabiskan-dana-760-miliar";

//$route['seo/sitemap\.xml'] = "seo/sitemap";


$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
