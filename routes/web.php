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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/hello', function () {
    return view('hello', ['title' => 'Hello World!']);
});

Route::get('/user', [UserController::class, 'index']);

Route::get('/user/{id}', [UserController::class, 'show']);

Route::get('/types_of_activity', [Type_of_activityController::class, 'index']);

Route::get('/type_of_activity/create', [Type_of_activityController::class, 'create']);

Route::post('/type_of_activity', [Type_of_activityController::class, 'store']);

Route::get('/type_of_activity/edit/{id}', [Type_of_activityController::class, 'edit']);

Route::post('/type_of_activity/update/{id}', [Type_of_activityController::class, 'update']);

Route::get("/type_of_activity/destroy/{id}", [Type_of_activityController::class, 'destroy']);
