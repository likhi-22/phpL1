<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Auth\RegisteredUSerController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
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
Route::controller(AuthenticatedSessionController::class)->group(function(){
    Route::get('/login','create')->name('login');
    Route::post('/login','store');
    Route::get('/logout','destroy')->name('logout');
});

Route::controller(RegisteredUserController::class)->group(function(){
    Route::get('/register','create')->name('register');
    Route::post('/register','store');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

/*Admin routes start here*/
Route::group(['middleware'=>'admin'],function(){

    Route::controller(AdminController::class)->group(function(){
        Route::get('/admin-dashboard','adminHome')->name('adminHome');
    });

    Route::controller(AdminUserController::class)->group(function(){
        Route::get('/users','show')->name('users');
        Route::get('/view-user/{id}',"viewUser")->name('viewUser');
        Route::get('/edit-user/{id}','editUser')->name('editUser');
        Route::post('/update-user','updateUser')->name('updateUser');
        Route::get('/delete-user/{id}','deleteUser')->name('deleteUser');
    });

});


/*Admin routes end here*/
/*User routes starts here*/
Route::group(['middleware'=>'user'],function(){

    Route::controller(UserController::class)->group(function () {
        Route::get('/user-dashboard', 'userHome')->name('userHome');
        Route::get('/profile',"profile")->name('profile');
        Route::get('/edit-profile',"editProfile")->name('editProfile');
        Route::post('/update-profile',"uProfile")->name('uProfile');
    });

});