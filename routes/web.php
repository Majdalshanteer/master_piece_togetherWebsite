<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SingleCategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CategoryCrudController;
use App\Http\Controllers\servicesCrudController;
use App\Http\Controllers\UserServicesController;
use App\Http\Controllers\WorkersController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AddToCartController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\DeleteFromCartController;
use App\Http\Controllers\CheckoutOrder;
use App\Http\Controllers\NormalUserController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\singleProductController;
use App\Http\Controllers\websiteRatingController;
use App\Http\Controllers\WorkersTableAdminController;
use App\Http\Controllers\ProfileAdminController;
use App\Http\Controllers\ProfileWorkerController;
use App\Http\Controllers\BookingWorkerController;
use App\Http\Controllers\TopRatedController;
use App\Http\Controllers\WebsiteRatingAdminController;
use App\Http\Controllers\WorkerRatingAdminController;
use App\Http\Controllers\workSampleController;
use App\Http\Controllers\CommentController;


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


Route::get('/appointment', function () {
    return view('pages.appointment');
});
// Route::get('/contact', function () {
//     return view('pages.contact');
// });

Route::get('/feature', function () {
    return view('pages.feature');
});
Route::get('/about', function () {
    return view('pages.about');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//dashboard routes
Route::resource('/', websiteRatingController::class);
Route::resource('/test', TopRatedController::class);

Route::resource('/usersinfo', UserController::class);
Route::resource('/workersinfo', WorkersTableAdminController::class);
Route::resource('/categories', CategoryCrudController::class);
Route::resource('/servicesCrud', servicesCrudController::class);
Route::resource('/bookCrud', BookingController::class);
Route::resource('/bookingWorker', BookingWorkerController::class);
Route::resource('/rate', RatingController::class);
Route::resource('/connectService', UserServicesController::class);
Route::resource('/view-messages', ContactController::class);
Route::resource('/orders', OrdersController::class);

// cart section
Route::post('/AddToCart',AddToCartController::class)->name('AddToCart');
Route::post('/DeleteFromCart',DeleteFromCartController::class)->name('DeleteFromCart');
Route::resource('/cart',CartController::class);
Route::post('/checkout',CheckoutOrder::class)->name('checkout');

Route::post('/Booking/create/{service_id}',[BookingController::class, 'create'])->name('Booking');
Route::post('/Rating/create/{worker_id}',[RatingController::class, 'create'])->name('Rating');

Route::resource('/adminDashboard', ProfileAdminController::class);
Route::resource('/workerDash', ProfileWorkerController::class);
Route::resource('/workSample', workSampleController::class);
Route::resource('/WebsiteRating', WebsiteRatingAdminController::class);
Route::resource('/WorkerRating', WorkerRatingAdminController::class);
Route::resource('/services', CategoryController::class);
Route::resource('/product', singleProductController::class);
Route::resource('/workers', WorkersController::class);
Route::resource('/profile', ProfileController::class);
Route::get('/profile/{id}/show/','ProfileController@show');

//contact form
Route::get('/contact-us', [ContactController::class, 'index']);
Route::post('/contact-us', [ContactController::class, 'store'])->name('contact.us.store');
Route::get('/contact', function () {
    return view('contactForm');
});


