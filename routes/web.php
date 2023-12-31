<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartItemController;
use App\Http\Controllers\OrderController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

/*
Route::resource('Products',ProductController::class);

Route::resource('Products',ProductController::class)->only([
    'index','show','store','update','destroy'
]);
*/
//Products
Route::get('Products', [ProductController::class, 'index'])->name("product.index");
Route::get('Products/{Product}', [ProductController::class, 'show'])->name("products.show");
Route::get('Products/create', [ProductController::class, 'create'])->name("products.create");
Route::post('Products', [ProductController::class, 'store'])->name("products.store");
Route::get('Products/{product}/edit', [ProductController::class, 'edit'])->name("products.edit");
Route::patch('Products/{product}', [ProductController::class, 'update'])->name("products.update");
Route::delete('Products/{product}', [ProductController::class, 'destroy'])->name("products.destroy");

//CartItems
Route::get('CartItems', [CartItemController::class, 'index'])->name("cartItem.index");
/*
Route::get('CartItems/{cartItem}', [CartItemController::class, 'show'])->name("cartItem.show");
Route::get('CartItems/create', [CartItemController::class, 'create'])->name("cartItem.create");
Route::post('CartItems', [CartItemController::class, 'store'])->name("cartItem.store");
Route::get('CartItems/{cartItem}/edit', [CartItemController::class, 'edit'])->name("cartItem.edit");
Route::patch('CartItems/{cartItem}', [CartItemController::class, 'update'])->name("cartItem.update");
Route::delete('CartItems/{cartItem}', [CartItemController::class, 'destroy'])->name("cartItem.destroy");
*/

//Order
Route::get('Orders', [OrderController::class, 'index'])->name("orders.index");
Route::get('Orders/{order}', [OrderController::class, 'show'])->name("orders.show");

/*
 * products.index
 * - url；Products
 * - http_method：GET|HEAD
 * - conn_controller_method：ProductController@index
 *
 * products.show
 * - url；Products/{Product}
 * - http_method：GET|HEAD
 * - conn_controller_method：ProductController@show
 *
 * products.create
 * - url；Products/create
 * - http_method：GET|HEAD
 * - conn_controller_method：ProductController@create
 *
 * products.store
 * - url；Products
 * - http_method：POST
 * - conn_controller_method：ProductController@store
 *
 * products.edit
 * - url；Products/{Product}/edit
 * - http_method：GET|HEAD
 * - conn_controller_method：ProductController@edit
 *
 * products.update
 * - url；Products/{Product}
 * - http_method：PUT|PATCH
 * - conn_controller_method：ProductController@update
 *
 * products.destroy
 * - url；Products/{Product}
 * - http_method：DELETE
 * - conn_controller_method：ProductController@destroy
 *
 */

/*
 * Blog & lara_0901專案與此專案路由比較：
 * - Blog & lara_0901 admin route
 * Route::prefix('admin')->name('admin.')->group(function () {
 *   Route::get('/', [AdminHomeController::class, 'index'])->name("home.index");
 *   Route::get('posts', [AdminPostsController::class, 'index'])->name("posts.index");
 *   Route::get('posts/create', [AdminPostsController::class, 'create'])->name("posts.create");
 *   Route::post('posts', [AdminPostsController::class, 'store'])->name("posts.store");
 *   Route::get('posts/{post}/edit', [AdminPostsController::class, 'edit'])->name("posts.edit");
 *   Route::patch('posts/{post}', [AdminPostsController::class, 'update'])->name("posts.update");
 *   Route::delete('posts/{post}', [AdminPostsController::class, 'destroy'])->name("posts.destroy");
 * });
 *
 * - eshop products route
 * Route::resource('Products',ProductController::class);
 *
 * -差異： Blog & lara_0901 專案 使用 prefix 方法可以给组中的每个路由添加指定的 URI 前缀，常見用途是做權限管理；
 * eshop 專案 則可直接透過指定url進入。
 *
 *
 * 列出7個Products路由應該有的作用：
 * products.index
 * - 以eshop專案為例，可能用於顯示目前有的產品資料。
 *
 * products.show
 * - 以eshop專案為例，可能用於顯示指定的產品資料。
 *
 * products.create
 * - 以eshop專案為例，可能用於顯示創建產品資料的資料表。
 *
 * products.store
 * - 以eshop專案為例，可能用於將create的表單產品資料新增至資料庫中。
 *
 * products.edit
 * - 以eshop專案為例，可能用於顯示用於編輯指定產品資料的表單。
 *
 * products.update
 * - 以eshop專案為例，可能用於更新資料庫的指定產品資料
 *
 * products.destroy
 * - 以eshop專案為例，可能用於刪除指定的現有產品資料
 *
 */
