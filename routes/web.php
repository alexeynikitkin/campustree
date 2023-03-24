<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\PostController;

use App\Http\Controllers\Campustree\CampusHomeController;
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





Route::get('/', [CampusHomeController::class, 'index'])->name('campus.home');
Route::get('/events/{leaf}', [CampusHomeController::class, 'showLeaf'])->name('showLeaf');
//Route::get('/askjas', [\App\Http\Controllers\Campustree\NotificationsController::class, 'show'])->name('showNotification');
Route::post('/events/{leaf}', [CampusHomeController::class, 'addLeafToUser'])->name('addLeafToUser');
Route::delete('/events/{leaf}', [CampusHomeController::class, 'deleteLeafFromUser'])->name('deleteLeafFromUser');
Route::get('/branch/{id}', [CampusHomeController::class, 'showBranch'])->name('showBranch');
Route::get('/users', [CampusHomeController::class, 'allUsers'])->name('allUsers');
Route::get('/friends', [CampusHomeController::class, 'allFriends'])->name('allFriends');
Route::post('/users', [\App\Http\Controllers\Campustree\FriendsController::class, 'store'])->name('addFriends');
Route::delete('/users', [\App\Http\Controllers\Campustree\FriendsController::class, 'destroy'])->name('deleteFriends');

Route::get('/create', [CampusHomeController::class, 'createLeaf'])->name('createLeaf')->middleware('role:admin');
Route::post('/events', [CampusHomeController::class, 'storeLeaf'])->name('storeLeaf')->middleware('role:admin');
Route::post('/', [\App\Http\Controllers\Campustree\CommentsController::class, 'store'])->name('commentCreate')->middleware('auth');
Route::get('/personal/{id}', [CampusHomeController::class, 'personal'])->name('personal')->middleware('auth');
Auth::routes();
Route::middleware('role:admin')->prefix('admin_panel')->group(function (){
    Route::get('/', [HomeController::class, 'index'])->name('homeAdmin');
    Route::resources([
        'category' => CategoryController::class,
        'post' => PostController::class,
        'comment' => \App\Http\Controllers\Campustree\CommentsController::class
    ]);
});

Route::post('/save-data', [CampusHomeController::class, 'saveData'])->name('saveUser');


