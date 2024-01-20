<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\RoomTypeController;
use App\Http\Controllers\Backend\TeamController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [UserController::class, 'Index']);


Route::get('/dashboard', function () {
    return view('frontend.dashboard.user_dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [UserController::class, 'userProfile'])->name('user.profile');
    Route::post('/profile/store', [UserController::class, 'UserStore'])->name('profile.store');
    Route::get('/user/logout', [UserController::class, 'UserLogout'])->name('user.logout');
    Route::get('/user/change/password', [UserController::class, 'UserChangePassword'])->name('user.change.password');
    Route::post('/password/change/store', [UserController::class, 'ChangePasswordStore'])->name('password.change.store');
});

require __DIR__.'/auth.php';

// Admin Group Middleware
Route::middleware(['auth', 'roles:admin'])->group(function(){
    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
    Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');
    Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
    Route::post('/admin/profile/store', [AdminController::class, 'AdminProfileStore'])->name('admin.profile.store');
    Route::get('/admin/change/password', [AdminController::class, 'AdminChangePassword'])->name('admin.change.password');
    Route::post('/admin/password/update', [AdminController::class, 'AdminPasswordUpdate'])->name('admin.password.update');
});

Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login');

// Admin Group Middleware
Route::middleware(['auth', 'roles:admin'])->group(function(){
    // Team ALL Route
    Route::controller(TeamController::class)->group(function(){
        Route::get('/all/team', 'AllTeam')->name('all.team');
        Route::get('/add/team', 'AddTeam')->name('add.team');
        Route::post('/add/store', 'StoreTeam')->name('team.store');
        Route::get('/edit/team/{id}', 'EditTeam')->name('edit.team');
        Route::post('/add/update', 'UpdateTeam')->name('team.update');
        Route::get('/delete/team/{id}', 'DeleteTeam')->name('delete.team');
    });

    // Book Area ALL Route
    Route::controller(TeamController::class)->group(function(){
        Route::get('/book/area', 'BookArea')->name('book.area');
        Route::post('/book/area/update', 'BookAreaUpdate')->name('book.area.update');
    });

    // RoomType ALL Route
    Route::controller(RoomTypeController::class)->group(function(){
        Route::get('/room/type/list', 'RoomTypeList')->name('room.type.list');
        Route::get('/room/type/add', 'AddRoomType')->name('add.room.type');
        Route::post('/room/type/store', 'RoomTypeStore')->name('room.type.store');
    });
});