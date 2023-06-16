<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Campustree\FriendsController;
use App\Http\Controllers\Campustree\CampusHomeController;
use App\Http\Controllers\Campustree\CommentsController;
use App\Http\Controllers\Admin\UserController;
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

// Home Page

Route::get('/', [CampusHomeController::class, 'index'])->name('campus.home');


// Leaf Page

Route::get('/events/{leaf}', [CampusHomeController::class, 'showLeaf'])->name('showLeaf');
Route::post('/events/{leaf}', [CampusHomeController::class, 'addLeafToUser'])->name('addLeafToUser');
Route::delete('/events/{leaf}', [CampusHomeController::class, 'deleteLeafFromUser'])->name('deleteLeafFromUser');

// Branch Page

Route::get('/branch/{id}', [CampusHomeController::class, 'showBranch'])->name('showBranch');

//Route::get('/branch/{id}', [CampusHomeController::class, 'showBranchFilter']);


// Users and Friends

Route::middleware(['role:admin', 'auth'])->group(function () {
    Route::get('/users', [CampusHomeController::class, 'allUsers'])->name('allUsers');
    Route::get('/friends', [CampusHomeController::class, 'allFriends'])->name('allFriends');
    Route::get('/friends_request', [CampusHomeController::class, 'friendsRequest'])->name('friendsRequest');
    Route::post('/users', [FriendsController::class, 'store'])->name('addFriends');
    Route::delete('/users', [FriendsController::class, 'destroy'])->name('deleteFriends');

    Route::post('/friends_request', [FriendsController::class, 'acceptFriend'])->name('acceptFriend');
    Route::delete('/friends_request', [FriendsController::class, 'declineFriend'])->name('declineFriend');
});

// Create Events
Route::middleware(['role:admin', 'auth'])->group(function (){
    Route::get('/create', [CampusHomeController::class, 'createLeaf'])->name('createLeaf');
    Route::post('/events', [CampusHomeController::class, 'storeLeaf'])->name('storeLeaf');
});

Route::get('/search', [CampusHomeController::class, 'search']);
// Create Comments in events pages

Route::post('/', [CommentsController::class, 'store'])->name('commentCreate');

// Personal Page

Route::get('/personal/{id}', [CampusHomeController::class, 'personal'])->name('personal')->middleware('auth');

//Save registered user data by ajax from LocalStorage

Route::post('/save-data', [CampusHomeController::class, 'saveData'])->name('saveUser');

// Autentification routes from Laravel/Fortify

Auth::routes();


// Admin panel routes

Route::prefix('admin_panel')->group(function (){
    Route::get('/', [HomeController::class, 'index'])->name('homeAdmin');
    Route::resources([
        'category' => CategoryController::class,
        'post' => PostController::class,
        'comment' => CommentsController::class,
        'user' => UserController::class
    ]);
});


// Show Register Create Form

Route::get('/register1',[UserController::class, 'create'])->middleware('guest');

// Create New User

Route::post('/users1', [UserController::class, 'store']);

// Log out User

Route::post('/logout1', [UserController::class, 'logout'])->middleware('auth');

// Show login Form

//Route::get('/login1', [UserController::class, 'login'])->name('login')->middleware('guest');

// Login User

Route::post('/users/authenticate1', [UserController::class, 'authenticate']);




