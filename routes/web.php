<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Public\OrderController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\SizeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Public\CartController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Public\PublicController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DistrictController;
use App\Http\Controllers\Admin\DashboardController;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

Route::get('/', [PublicController::class, 'index'])->name('public.index');
Route::get('/shop', [PublicController::class, 'shop'])->name('public.shop');
// Route::get('/product', [PublicController::class, 'product'])->name('public.product');
Route::get('/category/{category}/products', [PublicController::class, 'categoryWiseProducts'])->name('public.categories.products');
Route::get('/products/{product}', [PublicController::class, 'productDetails'])->name('public.product_details');
Route::get('/cart', [PublicController::class, 'cart'])->name('public.cart');
//Route::get('/checkout', [PublicController::class, 'checkout'])->name('public.checkout');
//Route::get('/order', [PublicController::class, 'order'])->name('public.order');
Route::get('/about-us', [PublicController::class, 'aboutUs'])->name('public.about_us');

//cart routes
Route::get('/cart-items', [CartController::class, 'index'])->middleware('auth')->name('carts.index');
Route::post('products/{product}/cart', [CartController::class, 'store'])->middleware('auth')->name('public.carts.store');
Route::delete('cart-items/{cartItem}', [CartController::class, 'destroy'])->middleware('auth')->name('carts.destory');

//order routes
Route::get('/order-complete', [OrderController::class, 'index'])->name('orders.index');
Route::get('/checkout', [OrderController::class, 'create'])->middleware('auth')->name('orders.create');
Route::post('/orders', [OrderController::class, 'store'])->middleware('auth')->name('orders.store');


// ========Comment Route ==========
Route::post('/products/{product}/comments', [CommentController::class, 'store'])->name('products.comments.store')->middleware('auth');

//Route::get('/login', [AuthController::class, 'login'])->name('customer.login');

Route::prefix('admin')->name('admin.')->group(function () {

    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard.index');

    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
    Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::patch('/products/{product}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');


    Route::get('/categories/trash', [CategoryController::class, 'trash'])->name('categories.trash');
    Route::patch('/categories/trash/{id}', [CategoryController::class, 'restore'])->name('categories.restore');
    Route::delete('/categories/trash/{id}', [CategoryController::class, 'delete'])->name('categories.delete');
    Route::resource('categories', CategoryController::class);

    Route::get('/courses/trash', [CourseController::class, 'trash'])->name('courses.trash');
    Route::patch('/courses/trash/{id}', [CourseController::class, 'restore'])->name('courses.restore');
    Route::delete('/courses/trash/{id}', [CourseController::class, 'delete'])->name('courses.delete');
    Route::resource('courses', CourseController::class);
    Route::resource('/courses', CourseController::class);


    Route::resource('sizes', SizeController::class);
    Route::resource('tags', TagController::class);
    Route::resource('districts', DistrictController::class);
    Route::resource('brands', BrandController::class);
    Route::resource('colors', ColorController::class);
    ROute::resource('users', UserController::class);

    // ===============Slider==============

    Route::get('/sliders/trash', [SliderController::class, 'trash'])->name('sliders.trash');
    Route::patch('/sliders/trash/{id}', [SliderController::class, 'restore'])->name('sliders.restore');
    Route::delete('/sliders/trash/{id}', [SliderController::class, 'delete'])->name('sliders.delete');

    Route::resource('sliders', SliderController::class);
});
