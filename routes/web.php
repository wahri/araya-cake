<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryProductController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\FrontpageController;
use App\Http\Controllers\ImageManagementController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\TestimoniController;
use App\Http\Controllers\VarianController;
use App\Models\SubCategoryProduct;
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

// Route::get('/', [FrontpageController::class, 'maintenance'])->name('maintenance');
Route::get('/', [FrontpageController::class, 'index'])->name('home');
Route::get('/tentang-araya', [FrontpageController::class, 'about'])->name('about');
Route::get('/galeri-araya', [FrontpageController::class, 'galleryCake'])->name('galleryCake');
Route::get('/kontak-araya', [FrontpageController::class, 'contact'])->name('contact');
Route::get('/produk-araya', [FrontpageController::class, 'product'])->name('product');
Route::get('/category/{slug}', [FrontpageController::class, 'categoryProduct'])->name('categoryProduct');
Route::get('/semua-cake', [FrontpageController::class, 'shop'])->name('shop');
Route::get('/detail/cake/{slug}', [FrontpageController::class, 'detailCake'])->name('detail.cake');
Route::get('/show/nota/{nota_no}', [FrontpageController::class, 'showNota'])->name('showNota');
Route::get('/show/receipt/{nota_no}', [FrontpageController::class, 'showReceipt'])->name('showReceipt');
Route::get('/konfirmasi-pesanan/{nota_no}', [FrontpageController::class, 'confirmWhatsapp'])->name('confirmWhatsapp');

Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::post('/getCartList', [CartController::class, 'getCartList'])->name('getCartList');
Route::post('/addToCart', [CartController::class, 'addToCart'])->name('addToCart');
Route::post('/updateCart', [CartController::class, 'updateCart'])->name('updateCart');
Route::post('/deleteCart', [CartController::class, 'deleteCart'])->name('deleteCart');
Route::post('/processOrder', [CartController::class, 'processOrder'])->name('processOrder');

Route::prefix('member')->name('member.')->middleware(['auth'])->group(function () {
    Route::get('/setting', [MemberController::class, 'setting'])->name('setting');
    Route::put('/updateProfile', [MemberController::class, 'updateProfile'])->name('updateProfile');
});

Route::prefix('admin')->name('admin.')->middleware(['auth', 'role:Admin'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    Route::get('/image-management', [ImageManagementController::class, 'index'])->name('imageManagement');
    Route::post('/upload-images', [ImageManagementController::class, 'uploadImages'])->name('uploadImages');
    Route::delete('/delete-images/{id}', [ImageManagementController::class, 'deleteImages'])->name('deleteImages');

    Route::resource('slider', SliderController::class);

    Route::resource('review', ReviewController::class);

    Route::resource('product', ProductController::class);
    Route::post('uploadProductImage', [ProductController::class, 'uploadProductImage'])->name('uploadProductImage');

    Route::resource('categoryProduct', CategoryProductController::class);
    Route::post('savePromoImage/{id}', [CategoryProductController::class, 'savePromoImage'])->name('categoryProduct.savePromoImage');
    Route::resource('subCategory', SubCategoryController::class);
    Route::get('/get-subcategories/{kategori}', [SubCategoryController::class, 'getSubcategories'])->name('getSubcategory');

    Route::get('/add-varian', [VarianController::class, 'createVarian'])->name('createVarian');
    Route::get('/add-color', [ColorController::class, 'createColor'])->name('createColor');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
