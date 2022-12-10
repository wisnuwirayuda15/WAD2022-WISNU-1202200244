<?php
// session_start();

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShowroomController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\UserController;
use App\Models\Showroom;

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

date_default_timezone_set("Asia/Jakarta");

if (!isset($_COOKIE['navcol'])) {

    setcookie("navcol", "navbar navbar-dark bg-primary bg-gradient navbar-expand-md fixed-top", time() + 3600);
    echo "<script>location.reload();</script>";
}


//Home route
Route::get('/', function () {

    return view('showrooms.home-wisnu', [
        'title' => 'Showroom Mobil',
        'welcome_name' => (isset(auth()->user()->name) ? ', '.auth()->user()->name.'!' : ''),
    ]);
});


//Login route
Route::get('/login', function () {
    return view('users.login-wisnu', [
        'title' => 'Login',
    ]);
})->name('login')->middleware('guest');
Route::post('/login', [UserController::class, 'authUser']);


//Register route
Route::get('/register', function () {
    return view('users.register-wisnu', [
        'title' => 'Register',
    ]);
})->name('register')->middleware('guest');
Route::post('/register', [UserController::class, 'addUser']);


//Logout route
Route::get('/logout', [UserController::class, 'logout']);


//Profile route
Route::resource('profile', ProfileController::class)->middleware('auth');


//Showroom route
Route::resource('showroom', ShowroomController::class)->middleware('auth');