<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\UploadController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Users\LoginController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\Users\LogoutController;
use App\Http\Controllers\Admin\Users\RegisterController;

Route::get('admin/users/login',[LoginController::class,'index'])->name('login');
Route::get('admin/users/register',[RegisterController::class,'index'])->name('register');
Route::get('/admin/users/logout', [LogoutController::class, 'logout'])->name('logout');
Route::post('/admin/users/login/store',[LoginController::class,'store']);
Route::post('/admin/users/register/store',[RegisterController::class,'register']);

Route::middleware(['admin'])->group(function(){
        Route::prefix('admin')->group(function () {
            Route::get('/', [MainController::class, 'index']);
            Route::get('main', [MainController::class, 'admin'])->name('admin');

            #Menu
            Route::prefix('menus')->group(function () {
                Route::get('add',[MenuController::class, 'create']);
                Route::post('add',[MenuController::class, 'store']);
                Route::get('list',[MenuController::class, 'index']);
                Route::get('edit/{menu}',[MenuController::class, 'show']);
                Route::post('edit/{menu}',[MenuController::class, 'update']);
                Route::DELETE('destroy',[MenuController::class, 'destroy']);
            });
            
            #Product
            Route::prefix('products')->group(function () {
                Route::get('add',[ProductController::class, 'create']);
                Route::post('add',[ProductController::class, 'store']);
                Route::get('list',[ProductController::class, 'index']);
                Route::get('edit/{product}',[ProductController::class, 'show']);
                Route::post('edit/{product}', [ProductController::class, 'update']);
                Route::DELETE('destroy', [ProductController::class, 'destroy']);
            });

            #Slider
            Route::prefix('sliders')->group(function () {
                Route::get('add',[SliderController::class, 'create']);
                Route::post('add',[SliderController::class, 'store']);
                Route::get('list',[SliderController::class, 'index']);
                Route::get('edit/{slider}',[SliderController::class, 'show']);
                Route::post('edit/{slider}', [SliderController::class, 'update']);
                Route::DELETE('destroy', [SliderController::class, 'destroy']);
            });

            #Upload
            Route::post('upload/services',[UploadController::class, 'store']);

            #Cart
            Route::get('customers', [\App\Http\Controllers\Admin\CartController::class, 'index']);
            Route::get('customers/view/{customer}', [\App\Http\Controllers\Admin\CartController::class, 'show']);

            #Blog
            Route::prefix('blogs')->group(function () {
                Route::get('add',[BlogController::class, 'create']);
                Route::post('add',[BlogController::class, 'store']);
                Route::get('list',[BlogController::class, 'index']);
                Route::get('edit/{blog}',[BlogController::class, 'show']);
                Route::post('edit/{blog}', [BlogController::class, 'update']);
                Route::DELETE('destroy', [BlogController::class, 'destroy']);
            });

        });
    }
);

Route::get('/', [MainController::class,'index']);
Route::post('/services/load-product', [MainController::class, 'loadProduct']);


Route::prefix('danh-muc')->group(function () {
    Route::get('/all', [App\Http\Controllers\MenuController::class, 'category']);
    Route::get('/{id}-{slug}.html', [App\Http\Controllers\MenuController::class, 'index']);
});

Route::get('/services/filter-product', [App\Http\Controllers\MenuController::class, 'filterProduct']);

Route::get('san-pham/{id}-{slug}.html', [App\Http\Controllers\ProductController::class, 'index']);

Route::post('add-cart', [App\Http\Controllers\CartController::class, 'index']);
Route::get('carts', [App\Http\Controllers\CartController::class, 'show']);
Route::post('update-cart', [App\Http\Controllers\CartController::class, 'update']);
Route::get('carts/delete/{id}', [App\Http\Controllers\CartController::class, 'remove']);
Route::post('carts', [App\Http\Controllers\CartController::class, 'addCart']);

Route::get('/blogs', [App\Http\Controllers\BlogController::class, 'index']);
Route::get('blog/{id}-{name}', [App\Http\Controllers\BlogController::class, 'show']);
Route::get('blog-detail/{id}-{slug}.html', [App\Http\Controllers\BlogDetailController::class, 'index']);

Route::get('/about', function () {return view('about', ['title' => 'About']);});
Route::get('/policy', function () {return view('policy', ['title' => 'Policy']);});
Route::get('/term', function () {return view('term', ['title' => 'Term']);});
Route::get('/contact', function () {return view('contact', ['title' => 'Contact']);});