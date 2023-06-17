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
|	https://codeigniter.com/userguide3/general/routing.html
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
//$route['default_controller'] = 'welcome';
$route['default_controller'] = 'user_controller';
$route['signup'] = 'user_controller/signup';
$route['login'] = 'user_controller/loginpage';
$route['user/login'] = 'user_controller/login';
$route['forgot_password'] = 'user_controller/passwordreset';
$route['user/reset_password'] = 'user_controller/forgotpassword';
$route['user/contact'] = 'user_controller/contact';
$route['reset/passord'] = 'admin/email/send';

//admin
$route['admin/event'] = 'admin/event';
$route['admin/event/create'] = 'admin/event/create';
$route['admin/event/edit/(:any)'] = 'admin/event/edit/$1';
$route['admin/event/update/(:any)'] = 'admin/event/update/$1';
$route['admin/event/delete/(:any)'] = 'admin/event/distroy/$1';

$route['admin_home'] = 'home_controller/adminHome';
$route['admin'] = 'admin/admin_controller';
$route['admin/account'] = 'admin/admin_controller/userAccount';
$route['admin/account'] = 'admin/admin_controller/userAccount';
$route['admin/account/edit/(:any)'] = 'admin/admin_controller/edit/$1';
$route['admin/user/profile/(:any)'] = 'admin/admin_controller/profile/$1';
$route['admin/user/change_psw/(:any)'] = 'admin/user_controller/changepassword/$1';
$route['admin/user/change/(:any)'] = 'admin/user_controller/passwordreset/$1';
$route['admin/user/message'] = 'admin/user_controller/messages';
$route['admin/message/delete/(:any)'] = 'admin/user_controller/distroy/$1';
$route['admin/message/show/(:any)'] = 'admin/user_controller/show/$1';


$route['admin/account/updateprofile/(:any)'] = 'admin/admin_controller/updateprofile/$1';

$route['admin/account/update/(:any)'] = 'admin/admin_controller/update/$1';
$route['admin/donor/edit/(:any)'] = 'admin/donor_controller/edit/$1';
$route['admin/donor/update/(:any)'] = 'admin/donor_controller/update/$1';
$route['admin/donation'] = 'admin/donor_controller/donation';
$route['admin/donor'] = 'admin/donor_controller';
$route['admin/donor/store'] = 'admin/donor_controller/store';
$route['admin/donor/get_all'] = 'admin/donor_controller/show';
$route['admin/donation'] = 'admin/donor_controller/donation';
$route['admin/hospital'] = 'admin/hospital_controller';
$route['admin/hospital/create'] = 'admin/hospital_controller/create';
$route['admin/hospital/store'] = 'admin/hospital_controller/store';
$route['admin/hospital/edit/(:any)'] = 'admin/hospital_controller/edit/$1';
$route['admin/hospital/update/(:any)'] = 'admin/hospital_controller/update/$1';
$route['admin/blood'] = 'admin/blood_controller';
$route['admin/blood/create/(:any)'] = 'admin/blood_controller/create/$1';
$route['admin/blood/store/(:any)'] = 'admin/blood_controller/store/$1';
$route['admin/blood/edit/(:any)'] = 'admin/blood_controller/edit/$1';
$route['admin/blood/update/(:any)'] = 'admin/blood_controller/update/$1';
$route['admin/bloodrequest'] = 'admin/bloodrequest';
$route['admin/bloodrequest/create'] = 'admin/bloodrequest/create';
$route['admin/bloodrequest/store'] = 'admin/bloodrequest/store';
$route['admin/bloodrequest/approve/(:any)'] = 'admin/bloodrequest/approve/$1';
$route['admin/bloodrequest/reject/(:any)'] = 'admin/bloodrequest/reject/$1';
$route['admin/bloodrequest/stock'] = 'admin/bloodrequest/stockdisplay';
//inventory
$route['inventory/event'] = 'inventory/event';
$route['inventory/event/create'] = 'inventory/event/create';
$route['inventory/event/edit/(:any)'] = 'inventory/event/edit/$1';
$route['inventory/event/update/(:any)'] = 'inventory/event/update/$1';
$route['inventory/event/delete/(:any)'] = 'inventory/event/distroy/$1';

$route['inventory_home'] = 'home_controller/inventoryHome';
$route['inventory'] = 'inventory/admin_controller';
$route['inventory/account'] = 'inventory/admin_controller/userAccount';
$route['inventory/account'] = 'inventory/admin_controller/userAccount';
$route['inventory/account/edit/(:any)'] = 'inventory/admin_controller/edit/$1';
$route['inventory/user/profile/(:any)'] = 'inventory/admin_controller/profile/$1';
$route['inventory/user/change_psw/(:any)'] = 'inventory/user_controller/changepassword/$1';
$route['inventory/user/change/(:any)'] = 'inventory/user_controller/passwordreset/$1';
$route['inventory/user/message'] = 'inventory/user_controller/messages';
$route['inventory/message/delete/(:any)'] = 'inventory/user_controller/distroy/$1';
$route['inventory/message/show/(:any)'] = 'inventory/user_controller/show/$1';


$route['inventory/account/updateprofile/(:any)'] = 'inventory/admin_controller/updateprofile/$1';

$route['inventory/account/update/(:any)'] = 'inventory/admin_controller/update/$1';
$route['inventory/donor/edit/(:any)'] = 'inventory/donor_controller/edit/$1';
$route['inventory/donor/update/(:any)'] = 'inventory/donor_controller/update/$1';
$route['inventory/donation'] = 'inventory/donor_controller/donation';
$route['inventory/donor'] = 'inventory/donor_controller';
$route['inventory/donor/store'] = 'inventory/donor_controller/store';
$route['inventory/donor/get_all'] = 'inventory/donor_controller/show';
$route['inventory/donation'] = 'inventory/donor_controller/donation';
$route['inventory/hospital'] = 'inventory/hospital_controller';
$route['inventory/hospital/create'] = 'inventory/hospital_controller/create';
$route['inventory/hospital/store'] = 'inventory/hospital_controller/store';
$route['inventory/hospital/edit/(:any)'] = 'inventory/hospital_controller/edit/$1';
$route['inventory/hospital/update/(:any)'] = 'inventory/hospital_controller/update/$1';
$route['inventory/blood'] = 'inventory/blood_controller';
$route['inventory/blood/create/(:any)'] = 'inventory/blood_controller/create/$1';
$route['inventory/blood/store/(:any)'] = 'inventory/blood_controller/store/$1';
$route['inventory/blood/edit/(:any)'] = 'inventory/blood_controller/edit/$1';
$route['inventory/blood/update/(:any)'] = 'inventory/blood_controller/update/$1';
$route['inventory/bloodrequest'] = 'inventory/bloodrequest';
$route['inventory/bloodrequest/create'] = 'inventory/bloodrequest/create';
$route['inventory/bloodrequest/store'] = 'inventory/bloodrequest/store';
$route['inventory/bloodrequest/approve/(:any)'] = 'inventory/bloodrequest/approve/$1';
$route['inventory/bloodrequest/reject/(:any)'] = 'inventory/bloodrequest/reject/$1';
$route['inventory/bloodrequest/stock'] = 'inventory/bloodrequest/stockdisplay';

//donor
$route['donor_home'] = 'home_controller/donorhome';
$route['donor'] = 'donor/admin_controller';
$route['donor/account'] = 'donor/admin_controller/userAccount';
$route['donor/profile/(:any)'] = 'donor/admin_controller/edit/$1';
$route['donor/user/change_psw/(:any)'] = 'donor/user_controller/changepassword/$1';
$route['donor/user/change/(:any)'] = 'donor/user_controller/passwordreset/$1';

$route['donor/account/updateprofile/(:any)'] = 'donor/admin_controller/updateprofile/$1';

$route['donor/donation'] = 'donor/donor_controller/donation';
$route['donor/donor'] = 'donor/donor_controller';
$route['donor/donor/store'] = 'donor/donor_controller/store';
$route['donor/hospital'] = 'donor/hospital_controller';
$route['donor/bloodrequest'] = 'donor/bloodrequest';
$route['donor/bloodrequest/stock'] = 'donor/bloodrequest/stockdisplay';
//hospital
$route['hospital/event'] = 'hospital/event';
$route['hospital_home'] = 'home_controller/hospitalHome';
$route['hospital'] = 'hospital/admin_controller';
$route['hospital/account'] = 'hospital/admin_controller/userAccount';
$route['hospital/account'] = 'hospital/admin_controller/userAccount';
$route['hospital/account/edit/(:any)'] = 'hospital/admin_controller/edit/$1';
$route['hospital/user/profile/(:any)'] = 'hospital/admin_controller/profile/$1';
$route['hospital/user/change_psw/(:any)'] = 'hospital/user_controller/changepassword/$1';
$route['hospital/user/change/(:any)'] = 'hospital/user_controller/passwordreset/$1';

$route['hospital/account/updateprofile/(:any)'] = 'hospital/admin_controller/updateprofile/$1';

$route['hospital/account/update/(:any)'] = 'admin/admin_controller/update/$1';
$route['hospital/donation'] = 'hospital/donor_controller/donation';
$route['hospital/donor'] = 'hospital/donor_controller';
$route['hospital/donor/store'] = 'hospital/donor_controller/store';
$route['hospital/donor/get_all'] = 'hospital/donor_controller/show';
$route['hospital/hospital'] = 'hospital/hospital_controller';
$route['hospital/hospital/create'] = 'hospital/hospital_controller/create';
$route['hospital/hospital/store'] = 'hospital/hospital_controller/store';
$route['hospital/bloodrequest'] = 'hospital/bloodrequest';
$route['hospital/bloodrequest/create'] = 'hospital/bloodrequest/create';
$route['hospital/bloodrequest/store'] = 'hospital/bloodrequest/store';

$route['hospital/bloodrequest/stock'] = 'hospital/bloodrequest/stockdisplay';
//lab
$route['lab/event'] = 'lab/event';
$route['lab/event/create'] = 'lab/event/create';
$route['lab/event/edit/(:any)'] = 'lab/event/edit/$1';
$route['lab/event/update/(:any)'] = 'lab/event/update/$1';
$route['lab/event/delete/(:any)'] = 'lab/event/distroy/$1';

$route['lab_home'] = 'home_controller/labHome';
$route['lab'] = 'lab/admin_controller';
$route['lab/account'] = 'lab/admin_controller/userAccount';
$route['lab/account'] = 'lab/admin_controller/userAccount';
$route['lab/account/edit/(:any)'] = 'lab/admin_controller/edit/$1';
$route['lab/user/profile/(:any)'] = 'lab/admin_controller/profile/$1';
$route['lab/user/change_psw/(:any)'] = 'lab/user_controller/changepassword/$1';
$route['lab/user/change/(:any)'] = 'lab/user_controller/passwordreset/$1';

$route['lab/account/updateprofile/(:any)'] = 'lab/admin_controller/updateprofile/$1';

$route['lab/account/update/(:any)'] = 'lab/admin_controller/update/$1';
$route['lab/donor/edit/(:any)'] = 'lab/donor_controller/edit/$1';
$route['lab/donor/update/(:any)'] = 'lab/donor_controller/update/$1';
$route['lab/donation'] = 'lab/donor_controller/donation';
$route['lab/donor'] = 'lab/donor_controller';
$route['lab/donor/store'] = 'lab/donor_controller/store';
$route['lab/donor/get_all'] = 'lab/donor_controller/show';
$route['lab/donation'] = 'lab/donor_controller/donation';
$route['lab/hospital'] = 'lab/hospital_controller';
$route['lab/hospital/create'] = 'lab/hospital_controller/create';
$route['lab/hospital/store'] = 'lab/hospital_controller/store';
$route['lab/hospital/edit/(:any)'] = 'lab/hospital_controller/edit/$1';
$route['lab/hospital/update/(:any)'] = 'lab/hospital_controller/update/$1';
$route['lab/blood'] = 'lab/blood_controller';
$route['lab/blood/create/(:any)'] = 'lab/blood_controller/create/$1';
$route['lab/blood/store/(:any)'] = 'lab/blood_controller/store/$1';
$route['lab/blood/edit/(:any)'] = 'lab/blood_controller/edit/$1';
$route['lab/blood/update/(:any)'] = 'lab/blood_controller/update/$1';
$route['lab/bloodrequest'] = 'lab/bloodrequest';
$route['lab/bloodrequest/create'] = 'lab/bloodrequest/create';
$route['lab/bloodrequest/store'] = 'lab/bloodrequest/store';
$route['lab/bloodrequest/approve/(:any)'] = 'lab/bloodrequest/approve/$1';
$route['lab/bloodrequest/reject/(:any)'] = 'lab/bloodrequest/reject/$1';
$route['lab/bloodrequest/stock'] = 'lab/bloodrequest/stockdisplay';

// nurse
$route['nurse/event'] = 'nurse/event';
$route['nurse/event/create'] = 'nurse/event/create';
$route['nurse/event/edit/(:any)'] = 'nurse/event/edit/$1';
$route['nurse/event/update/(:any)'] = 'nurse/event/update/$1';
$route['nurse/event/delete/(:any)'] = 'nurse/event/distroy/$1';

$route['nurse_home'] = 'home_controller/nurseHome';
$route['nurse'] = 'nurse/admin_controller';
$route['nurse/account'] = 'nurse/admin_controller/userAccount';
$route['nurse/account'] = 'nurse/admin_controller/userAccount';
$route['nurse/account/edit/(:any)'] = 'nurse/admin_controller/edit/$1';
$route['nurse/user/profile/(:any)'] = 'nurse/admin_controller/profile/$1';
$route['nurse/user/change_psw/(:any)'] = 'nurse/user_controller/changepassword/$1';
$route['nurse/user/change/(:any)'] = 'nurse/user_controller/passwordreset/$1';

$route['nurse/account/updateprofile/(:any)'] = 'nurse/admin_controller/updateprofile/$1';

$route['nurse/account/update/(:any)'] = 'nurse/admin_controller/update/$1';
$route['nurse/donor/edit/(:any)'] = 'nurse/donor_controller/edit/$1';
$route['nurse/donor/update/(:any)'] = 'nurse/donor_controller/update/$1';
$route['nurse/donation'] = 'nurse/donor_controller/donation';
$route['nurse/donor'] = 'nurse/donor_controller';
$route['nurse/donor/store'] = 'nurse/donor_controller/store';
$route['nurse/donor/get_all'] = 'nurse/donor_controller/show';
$route['nurse/donation'] = 'nurse/donor_controller/donation';
$route['nurse/hospital'] = 'nurse/hospital_controller';
$route['nurse/hospital/create'] = 'nurse/hospital_controller/create';
$route['nurse/hospital/store'] = 'nurse/hospital_controller/store';
$route['nurse/hospital/edit/(:any)'] = 'nurse/hospital_controller/edit/$1';
$route['nurse/hospital/update/(:any)'] = 'nurse/hospital_controller/update/$1';
$route['nurse/blood'] = 'nurse/blood_controller';
$route['nurse/blood/create/(:any)'] = 'nurse/blood_controller/create/$1';
$route['nurse/blood/store/(:any)'] = 'nurse/blood_controller/store/$1';
$route['nurse/blood/edit/(:any)'] = 'nurse/blood_controller/edit/$1';
$route['nurse/blood/update/(:any)'] = 'nurse/blood_controller/update/$1';
$route['nurse/bloodrequest'] = 'nurse/bloodrequest';
$route['nurse/bloodrequest/create'] = 'nurse/bloodrequest/create';
$route['nurse/bloodrequest/store'] = 'nurse/bloodrequest/store';
$route['nurse/bloodrequest/approve/(:any)'] = 'nurse/bloodrequest/approve/$1';
$route['nurse/bloodrequest/reject/(:any)'] = 'nurse/bloodrequest/reject/$1';
$route['nurse/bloodrequest/stock'] = 'nurse/bloodrequest/stockdisplay';

$route['logout'] = 'home_controller/logout';
$route['user/register'] = 'user_controller/register';
$route['default_controller'] = 'user_controller';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
