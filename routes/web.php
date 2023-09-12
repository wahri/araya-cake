<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryProductController;
use App\Http\Controllers\FrontpageController;
use App\Http\Controllers\ImageManagementController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\TestimoniController;
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

Route::get('/', [FrontpageController::class, 'index'])->name('home');
Route::get('/tentang-araya', [FrontpageController::class, 'about'])->name('about');
Route::get('/galeri-araya', [FrontpageController::class, 'galleryCake'])->name('galleryCake');
Route::get('/product/{slug}', [FrontpageController::class, 'product'])->name('product');
Route::get('/semua-cake', [FrontpageController::class, 'shop'])->name('shop');
Route::get('/detail/cake/{slug}', [FrontpageController::class, 'detailCake'])->name('detail.cake');

Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::post('/getCartList', [CartController::class, 'getCartList'])->name('getCartList');
Route::post('/addToCart', [CartController::class, 'addToCart'])->name('addToCart');
Route::post('/updateCart', [CartController::class, 'updateCart'])->name('updateCart');
Route::get('/processOrder', [CartController::class, 'processOrder'])->name('processOrder');

// Route::get('/dashboard', function () {
//     return view('admin/dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::prefix('admin')->name('admin.')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    Route::get('/image-management', [ImageManagementController::class, 'index'])->name('imageManagement');
    Route::post('/upload-images', [ImageManagementController::class, 'uploadImages'])->name('uploadImages');
    Route::delete('/delete-images/{id}', [ImageManagementController::class, 'deleteImages'])->name('deleteImages');

    Route::resource('slider', SliderController::class);
    
    Route::resource('review', ReviewController::class);

    Route::resource('product', ProductController::class);
    Route::post('uploadProductImage', [ProductController::class, 'uploadProductImage'])->name('uploadProductImage');

    Route::resource('categoryProduct', CategoryProductController::class);

    // Route::get('createCategoryProduct', [ProductController::class, 'createCategoryProduct'])->name('createCategoryProduct');
    // Route::post('storeCategoryProduct', [ProductController::class, 'storeCategoryProduct'])->name('storeCategoryProduct');
    // Route::get('editCategoryProduct', [ProductController::class, 'editCategoryProduct'])->name('editCategoryProduct');
    // Route::put('updateCategoryProduct', [ProductController::class, 'updateCategoryProduct'])->name('updateCategoryProduct');
    // Route::delete('deleteCategoryProduct', [ProductController::class, 'deleteCategoryProduct'])->name('deleteCategoryProduct');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
