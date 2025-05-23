<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ReviewerController;
use Illuminate\Support\Facades\Route;


Route::get('/',[PostController::class,'index'])->name('home');


//userside
Route::post('/user/save',[UserController::class,'save'])->name('user.save');
Route::post('/user/check',[UserController::class,'check'])->name('user.check');
Route::post('/user/dashboard',[UserController::class,'logout'])->name('user.logout');
Route::get('/views/aboutus',[UserController::class,'aboutus'])->name('user.aboutus');


Route::get('/user/register',[UserController::class,'register'])->name('user.register');
Route::get('/user/login',[UserController::class,'login'])->name('user.login');
Route::get('/user/dashboard',[UserController::class,'dashboard'])->name('user.dashboard');

Route::get('/user/dashboard/post/create',[PostController::class,'create'])->name('post.create');
Route::post('/user/dashboard/post/store',[PostController::class,'store'])->name('post.store');

Route::get('/user/dashboard/post/edit/{id}',[PostController::class,'edit'])->name('post.edit');
Route::put('/user/dashboard/post/update/{id}',[PostController::class,'update'])->name('post.update');
Route::delete('/user/dashboard/post/delete/{id}',[PostController::class,'destroy'])->name('post.delete');


//adminside
Route::post('/user/login', [UserController::class, 'login'])->name('user.login');
Route::get('admin/loginadmin', [AdminController::class, 'login'])->name('admin.loginadmin');
Route::post('admin/check', [AdminController::class, 'check'])->name('admin.check');
Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout.get');
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/admin/requestadmin', [AdminController::class, 'requestadmin'])->name('admin.requestadmin');
Route::get('/admin/approve/{id}', [AdminController::class, 'approvePost'])->name('admin.approvePost');
Route::get('/admin/reject/{id}', [AdminController::class, 'rejectPost'])->name('admin.rejectPost');



Route::get('/terms', function () {
  return view('terms');
})->name('terms');



//reviewer
Route::get('reviewer/loginreviewer', [ReviewerController::class, 'login'])->name('reviewer.loginreviewer');
Route::post('reviewer/check', [ReviewerController::class, 'check'])->name('reviewer.check');
Route::get('reviewer/dashboard', [ReviewerController::class, 'dashboard'])->name('reviewer.dashboard');
Route::post('/reviewer/logout', [ReviewerController::class, 'logout'])->name('reviewer.logout');
//pdf view
Route::get('/reviewer/post-pdf/{id}', [ReviewerController::class, 'viewPdf'])->name('reviewer.viewpdf');

//suggest
Route::post('/reviewer/suggest/{id}', [ReviewerController::class, 'saveSuggestion'])->name('reviewer.suggest');



Route::get('/reviewer/requestreviewer', [ReviewerController::class, 'requestreviewer'])->name('reviewer.requestreviewer');
Route::get('/dashboard-reviewer', [ReviewerController::class, 'dashboard'])
    ->name('reviewer.dashboardreviewer');


    Route::post('/reviewer/logout', [ReviewerController::class, 'logout'])->name('reviewer.logout'); 
    Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');




  Route::get('/reviewer/dashboard', [ReviewerController::class, 'reviewerDashboard'])->name('reviewer.dashboardreviewer');
// Route to show the reviewer dashboard
Route::get('/reviewer/dashboard', [ReviewerController::class, 'reviewerDashboard'])->name('reviewer.dashboardreviewer');

// Route for approving a post
Route::get('/reviewer/approve/{id}', [ReviewerController::class, 'approvePost'])->name('reviewer.approve');

// Route for rejecting a post
Route::get('/reviewer/reject/{id}', [ReviewerController::class, 'rejectPost'])->name('reviewer.reject');





    
  
