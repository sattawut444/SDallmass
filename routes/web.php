<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminUrlsController;
use App\Http\Controllers\AdminHistoryController;
use App\Http\Controllers\AdminUplodeFileControllers;
use App\Http\Controllers\AdminPageController;
use App\Http\Controllers\Ocupational_health_safety;
use App\Http\Controllers\Admin_GroupController;
use App\Http\Controllers\Admin_MenugroupController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// register Admin group
Route::get('/test', function () {
    return view('/admin/wut/test');
});Route::get('/admin/wut/test/{result}', [AdminPageController::class, 'test']);
Route::get('/admin/wut/test2/{post}', [AdminPageController::class, 'test2']);
// ADMIN ==================== 
// API ::
// Route::controller(AdminController::class)->group(function () {
//     Route::post('/admin/login', 'login');
// //     Route::post('/login', 'login');
// //     Route::post('/logout', 'logout');
// });
//  Post MENU ------------------------------------------------------
    // VerYo
//---------------------------- Dashboard ---------------------------
Route::get('/admin/count_download', [AdminController::class, 'count_download']);
//---------------------------- Admin Menu Groups -------------------
Route::get('/admin/menu', [Admin_MenugroupController::class, 'admin_menu']);
Route::get('/admin/memu_render', [Admin_MenugroupController::class, 'nemu_render']);

// //------------------------------ edit ------------------------------
// Route::get('/admin/edit/admin_user/{post_id}', [AdminController::class, 'delete_admin_user']);
// Route::get('/admin/delete/admin_user/{post_id}', [AdminController::class, 'delete_admin_user']);
//---------------------------- create pdf -------------------------- 
Route::controller(AdminPageController::class)->group(function () {
Route::get('/admin/create_pdf', 'create_pdf');
Route::get('/admin/update_pdf', 'update_pdf');
Route::post('/admin/back_out', 'back_out');
});
// --------------------------- Admin User -------------------------------
Route::post('/admin/admin_user', [AdminController::class, 'admin_user']);
Route::get('/admin/edit_admin_user/{post_id}', [AdminPageController::class, 'edit_admin']);
Route::post('/admin/delete/admin_user/', [AdminController::class, 'delete_admin_user']);
Route::get('/admin/delete/admin_users/{post_id}', [AdminPageController::class, 'delete_admin_user']);
Route::get('/admin/delete/admin_groups/{post_id}', [AdminPageController::class, 'delete_admin_group']);



//--------------------------- admin group -------------------------- 
// groups admin user
Route::get('/admin/edit/admin_group/{post_id}', [AdminPageController::class, 'admin_group']);
// Route::get('/admin/delete/admin_group/{post_id}', [AdminPageController::class, 'delete']);
Route::controller(Admin_GroupController::class)->group(function () {
    Route::get('/admin/admin_group', 'admin_groups');
    Route::post('/admin/create/admin_group', 'register');
    Route::post('/admin/delete/admin_group', 'delete');
});
// register Admin group
Route::get('/admin/register/admin_group', function () {
    return view('admin/veryo/create_admin_group');
});

//---------------------------- veryo -------------------------------
// sorting
Route::post('/admin/sorting', [AdminUrlsController::class, 'sorting']);

//--------------------------- LOGIN -------------------------- 

Route::post('/admin/login', [AdminController::class, 'login']);
Route::post('/admin/logout', [AdminController::class, 'logout']);
Route::post('/admin/register', [AdminController::class, 'register']);
    // Admin
// Route::get('/admin/admin_user', [AdminController::class, 'admin_user']);
// Route::get('/admin/delete/admin_user/{post_id}', [AdminController::class, 'delete_admin_user']);
Route::post('/admin/update/admin_user', [AdminController::class, 'update_admin']);
    // History Admin
Route::get('/admin/history_admin_log', [AdminHistoryController::class, 'HistoryAdminLogin']);
//     // Url
// Route::post('/admin/create_url', [AdminUrlsController::class, 'CreateUrl']);
// Route::post('/admin/update', [AdminUrlsController::class, 'UpdateUrl']);
Route::post('/admin/delete', [AdminUrlsController::class, 'DeleteUrl']);
    // Upload
Route::post('/admin/create_upload', [AdminUplodeFileControllers::class, 'file_upload']);
Route::get('/admin/update_file/{post_id}', [AdminUplodeFileControllers::class, 'update']);
Route::post('/admin/update_pdf', [AdminUplodeFileControllers::class, 'update_file']);
Route::get('/admin/add_actionplan', [AdminUplodeFileControllers::class, 'add_actionplan']);
    // Contact
// Route::post('/admin/contacts', [AdminContactController::class, 'Contact_all']);
// Route::get('/admin/contact/detail/{post_id}', [AdminContactController::class, 'contact_betail']);
// Route::posh('/admin/contact/delete/{post_id}', [AdminContactController::class, 'contact_delete']);
    // dashbord
Route::get('/admin/number', [AdminController::class, 'get_record']);


Route::controller(AdminUrlsController::class)->group(function () {
    Route::post('/admin/data_file', 'DetailGovernance');
    Route::get('/admin/add/', 'add');
    Route::get('/admin/add_performance', 'add_performance');
    Route::get('/admin/edit/{post_id}', 'edit');
    Route::get('/admin/delete/{post_id}', 'delete');

    // Route::get('/admin/update/', 'UpdateUrl');
});

//-------------------------- site ------------------------------------------
Route::post('/admin/file_download', [Ocupational_health_safety::class, 'show_file']);
Route::get('/admin/view_download/{post_id}', [Ocupational_health_safety::class, 'view_download']);

// -------------------------------------------------------------------------

// แก้ไข

//--------------------- create file -------------------------

Route::get('/admin/create_file', function () {
    return view('admin/veryo/create_pdf');
});
//--------------------- admin group -------------------------

Route::get('/admin/admin_groups', function () {
    return view('admin/admin_groups/index');
});

//----------------------- social ---------------------------

// social 
// Corporate Citizenship & Philanthropy
Route::get('/admin/social/citizenship_philanthropy', function () {
    return view('admin/social/citizenship/index');
});

// social 
// organization_associations
Route::get('/admin/social/organization_associations', function () {
    return view('admin/social/organization_associations/index');
});

// social
// Ethical Marketing
Route::get('/admin/social/ethical_marketing', function () {
    return view('admin/social/ethical_marketing/index');
});

// social 
// Corporate Healthy and Safe Work Environment
Route::get('/admin/social/healthy', function () {
    return view('admin/social/healthy/index');
});

// social
// Human Right
Route::get('/admin/social/human_right', function () {
    return view('admin/social/human_right/index');
});

// social 
// Human Capital & Labor Practies
Route::get('/admin/social/human_capital', function () {
    return view('admin/social/human_capital/index');
});   

// social 
// Human Capital & Labor Practies
Route::get('/admin/social/consumer_health', function () {
    return view('admin/social/consumer_health/index');
}); 

//----------------- policy_document -----------------------
// policy_document
Route::get('/admin/policy_document/policy_document', function () {
    return view('admin/policy_document/index');
});

//---------------- governance -----------------------------
// governance
Route::get('/admin/governance/governance', function () {
    return view('admin/governance/index');
});

// governance 
// code of download
Route::get('/admin/governance/code_of_download', function () {
    return view('admin/governance/code_of_download/index');
});

// governance 
// aniti_bribery_corruption
Route::get('/admin/governance/aniti_bribery_and_corruption', function () {
    return view('admin/governance/aniti_bribery_and_corruption/index');
});

//---------------- economic -----------------------------
//  economic 
//  Product Quailty And Afety
Route::get('/admin/economic/product_quailty_and_safety', function () {
    return view('admin/economic/product_quailty_and_safety/index');
});

//  economic 
//  Contribution to External Organization and Associations
Route::get('/admin/economic/contribution_to_external_organization_and_associations', function () {
    return view('admin/economic/contribution_to_external_organization_and_associations/index');
});

//  economic 
//  tax
Route::get('/admin/economic/tax', function () {
    return view('admin/economic/tax/index');
});

//  economic 
//  sustainable_supply_chain
Route::get('/admin/economic/sustainable_supply_chain', function () {
    return view('admin/economic/sustainable_supply_chain/index');
});

//  economic 
//  Lnnovation
Route::get('/admin/economic/lnnovation', function () {
    return view('admin/economic/lnnovation/index');
});

//---------------- environment ---------------------------
// Environment
// Sustainable Packaging
Route::get('/admin/environment/sustainable_packaging', function () {
    return view('admin/environment/sustainable_packaging/index');
});

// Environment
// Energy & Climate
Route::get('/admin/environment/energy_climate', function () {
    return view('admin/environment/energy_climate/index');
});

// Environment
// water_wastewater
Route::get('/admin/environment/water_wastewater', function () {
    return view('admin/environment/water_wastewater/index');
});

// Environment
// waste_manangement
Route::get('/admin/environment/waste_manangement', function () {
    return view('admin/environment/waste_manangement/index');
});

// // web ::
// governance 
// aniti_bribery_corruption
Route::get('/admin/governance/aniti_bribery_and_corruption/{result}', [AdminPageController::class, 'aniti_bribery_and_corruption']);



//////////////////////////////////////////////////////////
// login
// Route::get('/admin', function () {
//     return view('admin/auth/index');
// });
Route::get('/admin/login', function () {
    return view('admin/auth/index');
});
//  register
Route::get('/admin/register', function () {
    return view('admin/auth/register');
});
//  dashboard
Route::get('/admin/dashboard', function () {
    return view('admin/dashboard/index');
});
//  upload ***********************************************
Route::get('/admin/uploads', function () {
    return view('admin/uploads');
});
// Admin user
Route::get('/admin/admin_user', function () {
    return view('admin/admin/admin_user');
});
// register Admin user
Route::get('/admin/register/admin_user', function () {
    return view('admin/set_tool/add_admin_user');
});

Route::get('/admin/master', function () {
    return view('components/master');
});
// -----------------------------web-----------------------------------

// Home
Route::get('/', function () {
    return view('site/home/index');
});

//web Site

// ------------------- social
// social social/health-well-being-consumers.php
Route::get('/social', function () {
    return view('site/social/index');
});
// occupational-health-safety
Route::get('/social/occupational-health-safety', function () {
    return view('site/social/occupational-health-safety/index');
});
// health-well-being-consumers
Route::get('/social/health-well-being-consumers', function () {
    return view('site/social/health-well-being-consumers');
});
// health-well-being-consumers
Route::get('/social/health-well-being-consumers', function () {
    return view('site/social/health-well-being-consumers');
});
// social-contributions-investments
Route::get('/social/social-contributions-investments', function () {
    return view('site/social/social-contributions-investments');
});
// human-resource-development-labor-practices
Route::get('/social/human-resource-development-labor-practices', function () {
    return view('site/social/human-resource-development-labor-practices');
});
// human-rights 
Route::get('/social/human-rights', function () {
    return view('site/social/human-rights');
});
// marketing-responsible-communication-product-labels.blade
Route::get('/social/marketing-responsible-communication-product-labels', function () {
    return view('site/social/marketing-responsible-communication-product-labels');
});