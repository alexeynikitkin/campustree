<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Campustree\FriendsController;
use App\Http\Controllers\Campustree\CampusHomeController;
use App\Http\Controllers\Campustree\CommentsController;
use App\Http\Controllers\Campustree\NotificationsController;
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

Route::post('/leaf-to-friend', [CampusHomeController::class, 'leaftofriend']);


Route::post('/events/{leaf}', [CampusHomeController::class, 'addLeafToUser'])->name('addLeafToUser');


// Branch Page

Route::get('/branch/{id}', [CampusHomeController::class, 'showBranch'])->name('showBranch');

// Users and Friends

Route::middleware(['auth'])->group(function () {
    Route::delete('/events/{leaf}', [CampusHomeController::class, 'deleteLeafFromUser'])->name('deleteLeafFromUser');

    Route::get('/users', [CampusHomeController::class, 'allUsers'])->name('allUsers');
    Route::get('/friends', [CampusHomeController::class, 'allFriends'])->name('allFriends');
    Route::get('/friends_request', [CampusHomeController::class, 'friendsRequest'])->name('friendsRequest');
    Route::post('/users', [FriendsController::class, 'store'])->name('addFriends');
    Route::delete('/users', [FriendsController::class, 'destroy'])->name('deleteFriends');

    Route::delete('/notifications/{id}', [NotificationsController::class, 'destroy'])->name('deleteNotification');

    Route::post('/friends_request', [FriendsController::class, 'acceptFriend'])->name('acceptFriend');
    Route::delete('/friends_request', [FriendsController::class, 'declineFriend'])->name('declineFriend');
    // Personal Page
    Route::get('/personal/{id}', [CampusHomeController::class, 'personal'])->name('personal');

    //Events on Review
    Route::get('/events_on_review', [CampusHomeController::class, 'eventsOnReview'])->name('events_on_review');
    Route::post('/events_on_review', [CampusHomeController::class, 'changeStatus'])->name('changeStatus');
    //Search
    Route::get('/search', [CampusHomeController::class, 'search']);

    // Create Comments on events pages
    Route::post('/', [CommentsController::class, 'store'])->name('commentCreate');
});

    // Create Events
    Route::middleware(['auth'])->group(function (){
        Route::get('/create', [CampusHomeController::class, 'createLeaf'])->name('createLeaf');

        Route::post('/events', [CampusHomeController::class, 'storeLeaf'])->name('storeLeaf');

        Route::get('/edit/{id}', [CampusHomeController::class, 'editLeaf'])->name('editLeaf');
        Route::patch('/edit/{id}', [CampusHomeController::class, 'updateLeaf'])->name('updateLeaf');

    });







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




