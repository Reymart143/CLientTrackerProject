<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProjectController;

// Route::get('/', function () {       
//     return view('homepage');
// });
 Route::get('/login', function () {
        if (Auth::check()) {
            return redirect()->route('Dashboard');
        }
        return view('auth.login');
        // return redirect('/homepage');
    })->name('login'); 
    Route::post('login-user',[LoginController::class,'login_user'])->name('login-user');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/Dashboard',[DashboardController::class,'Dashboard'])->name('Dashboard');
    Route::middleware('auth')->group(function () {
    Route::post('/save-settings', [UserController::class, 'UserSettings']);
    Route::get('/get-user-settings', [UserController::class, 'getSettings']);
    //System Users Information
    Route::get('/profile',[UserController::class,'profile'])->name('profile');
    Route::post('/profile/update', [UserController::class, 'userUpdate'])->name('profile/update');
    Route::put('user/upload/update', [UserController::class, 'imageUpdate'])->name('user/upload/update');
    //PROJECTS CRUD
    Route::get('/projects',[ProjectController::class,'index'])->name('projects.index');
    Route::post('/projects/store', [ProjectController::class, 'store'])->name('projects.store');
    Route::get('/projects/{id}/edit', [ProjectController::class, 'edit'])->name('projects.edit');
    Route::put('/projects/{id}', [ProjectController::class, 'update'])->name('projects.update');
    Route::delete('projects.delete/{id}', [ProjectController::class, 'hardDelete'])->name('projects.delete');
 });
 
