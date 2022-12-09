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

        /*Category Controllers Backend*/
        Route::get('/categories', ['App\Http\Controllers\CustomController\CategoryController', 'adminCategoryList'])->name('admin.categoryList');
        Route::get('/categories/create', ['App\Http\Controllers\CustomController\CategoryController', 'adminCreateCategory'])->name('admin.createCategory');
        Route::post('/categories/create', ['App\Http\Controllers\CustomController\CategoryController', 'adminSaveCreateCategory'])->name('admin.saveCreateCategory');
        Route::get('/categories/modify/{category}', ['App\Http\Controllers\CustomController\CategoryController', 'adminModifyCategory'])->name('admin.modifyCategory');
        Route::post('/categories/modify/{category}', ['App\Http\Controllers\CustomController\CategoryController', 'adminSaveModifyCategory'])->name('admin.saveModifyCategory');
        Route::get('/categories/delete/{category?}', ['App\Http\Controllers\CustomController\CategoryController', 'adminDeleteCategory'])->name('admin.deleteCategory');

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

        /*Courier Controller Backend*/
        Route::get('/couriers', ['App\Http\Controllers\CustomController\CourierController', 'adminCourierList'])->name('admin.courierList');
        Route::get('/couriers/create', ['App\Http\Controllers\CustomController\CourierController', 'adminCreateCourier'])->name('admin.createCourier');
        Route::post('/couriers/create', ['App\Http\Controllers\CustomController\CourierController', 'adminSaveCreateCourier'])->name('admin.saveCreateCourier');
        Route::get('/couriers/modify/{courier}', ['App\Http\Controllers\CustomController\CourierController', 'adminModifyCourier'])->name('admin.modifyCourier');
        Route::post('/couriers/modify/{courier}', ['App\Http\Controllers\CustomController\CourierController', 'adminSaveModifyCourier'])->name('admin.saveModifyCourier');
        Route::get('/couriers/delete/{courier?}', ['App\Http\Controllers\CustomController\CourierController', 'adminDeleteCourier'])->name('admin.deleteCourier');

        /*User Controllers Backend*/
        Route::get('/users', ['App\Http\Controllers\CustomController\UserController', 'adminUserList'])->name('admin.userList');
        Route::get('/users/modify/{user}', ['App\Http\Controllers\CustomController\UserController', 'adminModifyUser'])->name('admin.modifyUser');
        Route::post('/users/modify/{user}', ['App\Http\Controllers\CustomController\UserController', 'adminSaveModifyUser'])->name('admin.saveModifyUser');

        /*Shop Data Controllers Backend*/
        Route::get('/shopData/modify', ['App\Http\Controllers\CustomController\ShopDataController', 'adminModifyShopData'])->name('admin.modifyShopData');
        Route::post('/shopData/modify', ['App\Http\Controllers\CustomController\ShopDataController', 'adminSaveModifyShopData'])->name('admin.saveModifyShopData');

        /*homepage Setting Controllers Backend*/
        Route::get('/homepageSetting', ['App\Http\Controllers\CustomController\HomepageSettingController', 'adminHomepageSettingList'])->name('admin.homepageSettingList');
        Route::get('/homepageSetting/modify/{setting}', ['App\Http\Controllers\CustomController\HomepageSettingController', 'adminModifyHomepageSetting'])->name('admin.modifyHomepageSetting');
        Route::post('/homepageSetting/modify/{setting}', ['App\Http\Controllers\CustomController\HomepageSettingController', 'adminSaveModifyHomepageSetting'])->name('admin.saveModifyHomepageSetting');

        /*Allergen Controllers Backend*/
        Route::get('/allergens', ['App\Http\Controllers\CustomController\AllergenController', 'adminAllergenList'])->name('admin.allergenList');
        Route::get('/allergens/create', ['App\Http\Controllers\CustomController\AllergenController', 'adminCreateAllergen'])->name('admin.createAllergen');
        Route::post('/allergens/create', ['App\Http\Controllers\CustomController\AllergenController', 'adminSaveCreateAllergen'])->name('admin.saveCreateAllergen');
        Route::get('/allergens/modify/{allergen}', ['App\Http\Controllers\CustomController\AllergenController', 'adminModifyAllergen'])->name('admin.modifyAllergen');
        Route::post('/allergens/modify/{allergen}', ['App\Http\Controllers\CustomController\AllergenController', 'adminSaveModifyAllergen'])->name('admin.saveModifyAllergen');
        Route::get('/allergens/delete/{allergen?}', ['App\Http\Controllers\CustomController\AllergenController', 'adminDeleteAllergen'])->name('admin.deleteAllergen');

        /*Ingredient Controllers Backend*/
        Route::get('/ingredients', ['App\Http\Controllers\CustomController\IngredientController', 'adminIngredientList'])->name('admin.ingredientList');
        Route::get('/ingredients/create', ['App\Http\Controllers\CustomController\IngredientController', 'adminCreateIngredient'])->name('admin.createIngredient');
        Route::post('/ingredients/create', ['App\Http\Controllers\CustomController\IngredientController', 'adminSaveCreateIngredient'])->name('admin.saveCreateIngredient');
        Route::get('/ingredients/modify/{ingredient}', ['App\Http\Controllers\CustomController\IngredientController', 'adminModifyIngredient'])->name('admin.modifyIngredient');
        Route::post('/ingredients/modify/{ingredient}', ['App\Http\Controllers\CustomController\IngredientController', 'adminSaveModifyIngredient'])->name('admin.saveModifyIngredient');
        Route::get('/ingredients/delete/{ingredient?}', ['App\Http\Controllers\CustomController\IngredientController', 'adminDeleteIngredient'])->name('admin.deleteIngredient');
    });
});



//Routes frontend
//Route::get('/register', ['App\Http\Controllers\Admin\Auth\AuthController', 'getRegister']);
Route::get('/', ['App\Http\Controllers\Frontend\HomeController', 'homePage'])->name('frontend.homepage');

Route::get('/login', function (){
   return 'next page login';
})->name('login');
