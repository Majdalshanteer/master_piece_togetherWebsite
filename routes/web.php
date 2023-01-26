<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SingleCategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\servicesController;
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
//     return view('pages.index');
// });
// Route::get('/singleproduct', function () {
//     return view('pages.singleProduct');
// });
Route::get('/404', function () {
    return view('pages.404');
});
// Route::get('/about', function () {
//     return view('pages.about');
// });
Route::get('/appointment', function () {
    return view('pages.appointment');
});
// Route::get('/contact', function () {
//     return view('pages.contact');
// });

Route::get('/feature', function () {
    return view('pages.feature');
});
Route::get('/project', function () {
    return view('pages.project');
});

Route::get('/team', function () {
    return view('pages.team');
});
Route::get('/testimonial', function () {
    return view('pages.testimonial');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//dashboard routes
Route::resource('/', websiteRatingController::class);
Route::resource('/about', TopRatedController::class);
// Route::resource('/about', TopRatedController::class);
Route::resource('/usersinfo', UserController::class);
Route::resource('/workersinfo', WorkersTableAdminController::class);
Route::resource('categories', CategoryCrudController::class);
Route::resource('/servicesCrud', servicesCrudController::class);
Route::resource('/bookCrud', BookingController::class);
Route::resource('/bookingWorker', BookingWorkerController::class);
Route::resource('/rate', RatingController::class);
Route::resource('/connectService', UserServicesController::class);
Route::resource('view-messages', ContactController::class);

Route::resource('/orders', OrdersController::class);


Route::post('AddToCart',AddToCartController::class)->name('AddToCart');
Route::post('DeleteFromCart',DeleteFromCartController::class)->name('DeleteFromCart');
Route::resource('cart',CartController::class);
Route::post('/checkout',CheckoutOrder::class)->name('checkout');
// Route::resource('myaccount',NormalUserController::class);
// Route::get('rate',function(){
//     return redirect()->route('workers.index');
// })->name('rate');



Route::post('Booking/create/{service_id}',[BookingController::class, 'create'])->name('Booking');
Route::post('Rating/create/{worker_id}',[RatingController::class, 'create'])->name('Rating');
// Route::get('Rating/index/{worker_id}',[RatingController::class, 'index'])->name('Rating');
// Route::get('Rating/{worker_id}',[RatingController::class, 'show'])->name('show');;
// Route::post('/booking/create/{product_id}', [bookingController::class, 'Create'])->name('createBooking');


// Route::get('/das', function () {
//     return view('admindashboard.index');
// });
Route::resource('adminDashboard', ProfileAdminController::class);
Route::resource('workerDash', ProfileWorkerController::class);
Route::resource('WebsiteRating', WebsiteRatingAdminController::class);

Route::resource('services', CategoryController::class);
// Route::resource('servicesView', servicesController::class);
Route::resource('product', singleProductController::class);
// Route::resource('product', singleProductController::class);
// Route::get('/product/{service_id}', 'singleProductController@show');
Route::resource('workers', WorkersController::class);
Route::resource('/profile', ProfileController::class);


//contact form
// Route::resource('/con', ContactController::class);
Route::get('contact-us', [ContactController::class, 'index']);
Route::post('contact-us', [ContactController::class, 'store'])->name('contact.us.store');
Route::get('/contact', function () {
    return view('contactForm');
});

// Route::resource('/404', SingleCategoryController::class);

