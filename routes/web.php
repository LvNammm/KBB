<?php

use App\Http\Controllers\Admin\AdminCtrl;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryCtrl;
use App\Http\Controllers\ProductCtrl;
use App\Http\Controllers\PolicyCtrl;
use App\Http\Controllers\Admin\Interface_ColorCtrl;
use App\Http\Controllers\Admin\CategoryAdminCtrl;
use App\Http\Controllers\Admin\ProductAdminCtrl;
use App\Http\Controllers\Admin\CatalogueAdminController;
use  App\Http\Controllers\Catalogue;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get("/",[CategoryCtrl::class,'index']);
Route::get("/danhmuc/{danhmuc}",[CategoryCtrl::class,'showProductByCategory']);
Route::get("sanpham/{sp}",[ProductCtrl::class,"show"]);
Route::get("trogiup/{tg}",[PolicyCtrl::class,"index"]);
Route::get("/catalogue",[Catalogue::class,'index']);
Route::get("/catalogue/{link}",[Catalogue::class,'viewProductCatalogue']);

//
Route::get("/delete-types",[ProductCtrl::class,'deleteType']);
Route::get("/add-type",[ProductCtrl::class,"addType"]);
Route::get("/link",[ProductCtrl::class,'createLink']);
Route::get("/catalogue/{link}/d",[CatalogueAdminController::class,'deleteFromCatalogue']);

Route::group(['prefix' => 'admin'], function () {
    Route::get("/",[AdminCtrl::class,"index"]);
    Route::get("/login",[AdminCtrl::class,"login"]);
    Route::post("/auth",[AdminCtrl::class,"auth"]);
    Route::get("/logout",[AdminCtrl::class,"logout"]);
    
    //color
    Route::get("/interface",[Interface_ColorCtrl::class,"index"]);
    Route::post("/interface/change-color",[Interface_ColorCtrl::class,"changeColor"]);

    //category

    Route::get("/category",[CategoryAdminCtrl::class,"index"]);
    Route::get("/category/delete/{id}",[CategoryAdminCtrl::class,"delete"]);
    Route::get("/create-category",[CategoryAdminCtrl::class,"create"]);
    Route::post("/add-category",[CategoryAdminCtrl::class,"add"]);
    Route::get("/category/edit/{id}",[CategoryAdminCtrl::class,"edit"]);
    Route::post("/update-category/{id}",[CategoryAdminCtrl::class,"update"]);

    //
    Route::get("/create-product",[ProductAdminCtrl::class,"create"]);
    Route::post("/add-product",[ProductAdminCtrl::class,"add"]);
    Route::get("/product",[ProductAdminCtrl::class,"index"]);
    Route::get("/product/delete/{id}",[ProductAdminCtrl::class,"delete"]);

    //catalogue
    Route::get("/create-catalogue",[CatalogueAdminController::class,"create"]);
    Route::get("/searchProduct/{keySearch}",[CatalogueAdminController::class,"searchProduct"]);
    Route::post("/add-catalogue",[CatalogueAdminController::class,"add"]);
});


