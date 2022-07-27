<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\CategoryController;


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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('admin.control-panel');
})->middleware(['auth'])->name('dashboard');

// start routele de administare

Route::prefix('admin')->middleware(['admin'])->group( function(){

    Route::get('/users', [UsersController::class, 'showUsers'])->name('users');

    Route::get('/user-new', [UsersController::class, 'newUser'])->name('users.new');

    Route::post('/user-new', [UsersController::class, 'createUser'])->name('users.create');

    // editare users

    Route::get('/user-edit/{id}', [UsersController::class, 'showEditForm'])->name('users.editForm');

    Route::put('/user-edit/{id}', [UsersController::class, 'updateUserForm'])->name('users.update');
});

// end routele de administare

 // ruta pentru resetarea parolei

 Route::prefix('admin')->middleware(['auth', 'verified'])->group(function(){

    // afisam categoriile
    Route::get('categories', [CategoryController::class, 'showCategories'])->name('admin.categories');
    Route::get('categories/new', [CategoryController::class, 'newCategory'])->name('admin.categories.new');
    Route::post('categories/new', [CategoryController::class, 'addCategory'])->name('admin.categories.add');

    Route::get('categories/edit/{id}', [CategoryController::class, 'editCategory'])->name('admin.categories.edit');
    Route::put('categories/edit/{id}', [CategoryController::class, 'updateCategory'])->name('admin.categories.update');
    Route::delete('categories/delete/{id}', [CategoryController::class, 'deleteCategory'])->name('admin.categories.delete');


 });

// routele pentru utilizatori

Route::prefix('admin')->middleware(['auth', 'verified'])->group( function(){

    Route::get('profile/{id}', [ProfileController::class, 'showProfile'])->name('user.profile');

    Route::put('profile/{id}', [ProfileController::class, 'updateProfile'])->name('user.profile-update');

    // ruta pentru resetarea parolei

    Route::put('reset-password', [ProfileController::class, 'resetPassword'])->name('user.reset-password');
});

//IMPLEMENTARE RUTE PENTRU FRONTEND

Route::get('/', function () {
    return view('front.home');
})->name('home');

// end routele de utilizatori

require __DIR__.'/auth.php';
