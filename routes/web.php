<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;


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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/user', [UserController::class, 'index']);

Route::get('/user/{id}', [UserController::class, 'show']);

Route::get('/types_of_activity', [Type_of_activityController::class, 'index'])->middleware('auth');

Route::get('/type_of_activity/create', [Type_of_activityController::class, 'create'])->middleware('auth');

Route::post('/type_of_activity', [Type_of_activityController::class, 'store']);

Route::get('/type_of_activity/edit/{id}', [Type_of_activityController::class, 'edit'])->middleware('auth');

Route::post('/type_of_activity/update/{id}', [Type_of_activityController::class, 'update'])->middleware('auth');

Route::get("/type_of_activity/destroy/{id}", [Type_of_activityController::class, 'destroy'])->middleware('auth');

// Route::get('/login', [LoginController::class, 'login']);

Route::get('/logout', [LoginController::class, 'logout']);

Route::post('/auth', [LoginController::class, 'authenticate']);

Route::get('/', [LoginController::class, 'login']);

Route::get('/error', function(){
    return view('error', ['message' => session('message')]);
});
