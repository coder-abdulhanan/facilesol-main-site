<?php

use Illuminate\Support\Facades\Route;

// Frontend Controllers
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\frontend\AboutController;
use App\Http\Controllers\frontend\ProjectsController;
use App\Http\Controllers\frontend\FaqsController;
use App\Http\Controllers\frontend\TeamController;
use App\Http\Controllers\frontend\ContactController;
use App\Http\Controllers\frontend\ServicesController;
use App\Http\Controllers\frontend\POSDetailsController;

//Backend Controllers
use App\Http\Controllers\backend\AdminLoginController;
use App\Http\Controllers\backend\AdminHomeController;
use App\Http\Controllers\backend\AdminProjectsController;
use App\Http\Controllers\backend\TeamMemberController;
use App\Http\Controllers\backend\AdminBlogController;
use App\Http\Controllers\backend\AdminFaqsController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Frontend
Route::get('/', [HomeController::class, 'index']);
Route::get('/about', [AboutController::class, 'index']);
Route::get('/team', [TeamController::class, 'index']);
Route::get('/faqs', [FaqsController::class, 'index']);
Route::get('/projects', [ProjectsController::class, 'index']);
Route::get('/services', [ServicesController::class, 'index']);
Route::get('/pos', [POSDetailsController::class, 'index']);
Route::get('/contact', [ContactController::class, 'index']);
Route::post('/contact', [ContactController::class, 'submitMessage']);


// Route::get('/admins', function () {
//     $admins = Admins::all();
//     echo "<pre>";
//     print_r($admins->toArray());

// });

// Backend

Route::get('/admin', [AdminHomeController::class, 'index'])->name('admin.home');

//Admin Module
Route::group(['as' => 'admin.', 'prefix' => '/admin/'], function(){
    // Login
    Route::get('login', [AdminLoginController::class, 'index'])->name('login');
    Route::post('login', [AdminLoginController::class, 'onLogin'])->name('submit');
    Route::get('logout', [AdminLoginController::class, 'logoutAdmin'])->name('logout');
    // Registration
    Route::get('register', [AdminHomeController::class, 'registerAdmin'])->name('add');
    Route::post('register', [AdminHomeController::class, 'submitAdminRecord'])->name('register');
    // Admin Management
    Route::get('admins-list', [AdminHomeController::class, 'showAdminRecord'])->name('show');
    Route::get('delete/{id}', [AdminHomeController::class, 'deleteAdminRecord'])->name('delete');
    Route::get('edit/{id}', [AdminHomeController::class, 'editAdminRecord'])->name('edit');
    Route::put('update/{id}', [AdminHomeController::class, 'updateAdminRecord'])->name('update');

});

// Team Module
Route::group(['as' => 'team.', 'prefix' => '/admin/'], function(){
    Route::get('team', [TeamMemberController::class, 'index'])->name('show');
    Route::get('team-member-details/{id}', [TeamMemberController::class, 'showTeamMember'])->name('details');
    Route::get('team-add', [TeamMemberController::class, 'registerTeam'])->name('add');
    Route::post('team-add', [TeamMemberController::class, 'submitTeamRecord']);
    Route::get('team-edit/{id}', [TeamMemberController::class, 'editTeam'])->name('edit');
    Route::put('team-edit/{id}', [TeamMemberController::class, 'updateTeam'])->name('update');
    Route::delete('team-delete/{id}', [TeamMemberController::class, 'deleteTeam'])->name('delete');
});

// FAQs Module
Route::group(['as' => 'faq.', 'prefix' => '/admin/'], function(){
    Route::get('faqs', [AdminFaqsController::class, 'index'])->name('show');
    Route::get('faq-add', [AdminFaqsController::class, 'addFAQ'])->name('add');
    Route::post('faq-add', [AdminFaqsController::class, 'submitFaqRecord'])->name('submit');
    Route::get('faq-edit/{id}', [AdminFaqsController::class, 'editFAQ'])->name('edit');
    Route::put('faq-edit/{id}', [AdminFaqsController::class, 'updateFAQ'])->name('update');
    Route::delete('faq-delete/{id}', [AdminFaqsController::class, 'deleteFAQ'])->name('delete');
});

// Project Module
Route::group(['as' => 'project.', 'prefix' => '/admin/'], function(){
    Route::get('projects', [AdminProjectsController::class, 'index'])->name('show');
    Route::get('project-add', [AdminProjectsController::class, 'addProject'])->name('add');
    Route::post('project-add', [AdminProjectsController::class, 'submitProjectRecord']);
    Route::get('project-edit/{id}', [AdminProjectsController::class, 'editProject'])->name('edit');
    Route::put('project-edit/{id}', [AdminProjectsController::class, 'updateProject'])->name('update');
    Route::delete('project-delete/{id}', [AdminProjectsController::class, 'deleteProject'])->name('delete');
});

// Route::get('/admin/blogs', [AdminBlogController::class, 'index'])->name('blogs.show');
// Route::get('/admin/blog-add', [AdminBlogController::class, 'addBlog'])->name('blog.add');
// Route::post('/admin/project-add', [AdminBlogController::class, 'submitRecord'])->name('blog.sumbit');

// Route::get('/admin/project-edit/{id}', [AdminProjectsController::class, 'editProject'])->name('project.edit');
// Route::put('/admin/project-edit/{id}', [AdminProjectsController::class, 'updateProject'])->name('project.update');


// Route::delete('/admin/blog-delete/{id}', [AdminBlogController::class, 'deleteRecord'])->name('blog.delete');

// Blog Module
Route::group(['as' => 'blog.', 'prefix' => '/admin/'], function(){
    Route::get('blogs', [AdminBlogController::class, 'index'])->name('show');
    Route::get('blog-add', [AdminBlogController::class, 'addBlog'])->name('add');
    Route::post('blog-add', [AdminBlogController::class, 'submitRecord'])->name('sumbit');
    Route::delete('blog-delete/{id}', [AdminBlogController::class, 'deleteRecord'])->name('delete');
});


// Route::group([], function(){
    //Routes Grouping with Closure Function
// })


// php artisan route:list
//Route as
