<?php

use Illuminate\Http\Request;
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

//dynamic function for web
Route::prefix('takeData')->group(function () {
    Route::any('/{controller}/{function}', function (Request $request, $controller, $function) {
        return (new ('App\Http\Controllers\CustomController\\'.$controller))->{strtolower($request->method()).$function}();
    });
});




//Routes Admin for administration
Route::prefix('admin')->group(function () {
    Route::get('/login', ['App\Http\Controllers\Admin\Auth\AuthController', 'getLogin'])->name('admin.getLogin');
    Route::post('/login', ['App\Http\Controllers\Admin\Auth\AuthController', 'postLogin'])->name('admin.postLogin');
    Route::get('/logout', ['App\Http\Controllers\Admin\Auth\AuthController', 'getLogout'])->name('admin.getLogout');

    Route::middleware(['auth', 'isAdmin'])->group(function () {
        Route::get('/dashboard', ['App\Http\Controllers\Admin\DashboardController', 'getDashboard'])->name('admin.dashboard');
        Route::post('/notification/read', ['App\Http\Controllers\Admin\NotificationController', 'postReadNotification'])->name('admin.postReadNotification');

        /*Product Controllers Backend*/
        Route::get('/products', ['App\Http\Controllers\CustomController\ProductController', 'adminProductList'])->name('admin.productList');
        Route::get('/products/create', ['App\Http\Controllers\CustomController\ProductController', 'adminCreateProduct'])->name('admin.createProduct');
        Route::post('/products/create', ['App\Http\Controllers\CustomController\ProductController', 'adminSaveCreateProduct'])->name('admin.saveCreateProduct');
        Route::get('/products/modify/{product}', ['App\Http\Controllers\CustomController\ProductController', 'adminModifyProduct'])->name('admin.modifyProduct');
        Route::post('/products/modify/{product}', ['App\Http\Controllers\CustomController\ProductController', 'adminSaveModifyProduct'])->name('admin.saveModifyProduct');
        Route::get('/products/delete/{product?}', ['App\Http\Controllers\CustomController\ProductController', 'adminDeleteProduct'])->name('admin.deleteProduct');

        /*Menu Controller Backend*/
        Route::get('/menus', ['App\Http\Controllers\CustomController\MenuController', 'adminMenuList'])->name('admin.menuList');
        Route::get('/menus/create', ['App\Http\Controllers\CustomController\MenuController', 'adminCreateMenu'])->name('admin.createMenu');
        Route::post('/menus/create', ['App\Http\Controllers\CustomController\MenuController', 'adminSaveCreateMenu'])->name('admin.saveCreateMenu');
        Route::get('/menus/modify/{menu}', ['App\Http\Controllers\CustomController\MenuController', 'adminModifyMenu'])->name('admin.modifyMenu');
        Route::post('/menus/modify/{menu}', ['App\Http\Controllers\CustomController\MenuController', 'adminSaveModifyMenu'])->name('admin.saveModifyMenu');
        Route::get('/menus/delete/{menu?}', ['App\Http\Controllers\CustomController\MenuController', 'adminDeleteMenu'])->name('admin.deleteMenu');
    });
});



//Routes frontend
//Route::get('/register', ['App\Http\Controllers\Admin\Auth\AuthController', 'getRegister']);
Route::get('/', function () {
    return view('welcome');
})->name('frontend.homepage');

Route::get('/login', function (){
   return 'next page login';
})->name('login');
