<?php

use App\Http\Controllers\users\userController;
use App\Http\Controllers\users\authUserController;
use App\Http\Controllers\tasksController;
use Illuminate\Support\Facades\Route;

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

Route :: get('Users',[userController :: class , 'index']);
Route :: get('Users/Create',[userController :: class , 'create']);
Route :: post('Users/Store',[userController :: class , 'store']);
###############################################################################################################
Route :: get('Tasks',[tasksController :: class , 'index']);
Route :: get('Tasks/Create',[tasksController :: class , 'create']);
Route :: post('Tasks/Store',[tasksController :: class , 'store']);
Route :: get('Tasks/Delete/{id}',[tasksController :: class , 'delete']);
###############################################################################################################

// AUTH ROUTES . . .
Route :: get('Login',[authUserController :: class , 'login']);
Route :: post('DOLogin',[authUserController :: class , 'doLogin']);
Route :: get('Logout',[authUserController :: class , 'Logout']);


###############################################################################################################
