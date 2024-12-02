<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\UserReviewController;
use App\Http\Controllers\WebsiteReviewController;
use App\Http\Controllers\GovernatesController;
use Faker\Provider\ar_EG\Payment;
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
Route::get('/governates', [GovernatesController::class, 'getGovernates']);
Route::get('/dashboard', function () {
    return view('dashboard')->name('dashboard');
});
Route::get('/', function () {
    return view('user.homePage.index');
});
// Route::get('/', function () {
//     return view('admin.index');
// })->name('admin.dashboard');

Route::controller(UserController::class)->prefix('admin/users')->name('admin.users.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/addUser', 'create')->name('addUser');
    Route::post('/storeUser', 'store')->name('storeUser');
    Route::get('/userDetails/{id}', 'show')->name('userDetails');
    Route::get('/editUser/{id}', 'edit')->name('editUser');
    Route::patch('/editUser/{id}', 'update')->name('updateUser');
    Route::get('/adminProfile', 'adminProfile')->name('adminProfile');
    Route::get('/cities/{governate}',  'getCitiesByGovernate');

});

Route::controller(CategoryController::class)->prefix('admin/categories')->name('admin.categories.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/addCategory', 'create')->name('addCategory');
    Route::post('/storeCategory','store')->name('storeCategory');
    Route::get('/categoryDetails/{id}', 'show')->name('showCategory');
    Route::get('/editCategory/{id}', 'edit')->name('editCategory');
    Route::PATCH('/updateCategory/{id}', 'update')->name('updateCategory');
    Route::delete('/deleteCategory/{id}', 'destroy')->name('deleteCategory');
});

Route::controller(JobController::class)->prefix('admin/jobs')->name('admin.jobs.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/addJob', 'create')->name('addJob');
    Route::post('/storeJob','store')->name('storeJob');
    Route::get('/jobDetails/{id}', 'show')->name('jobDetails');
    Route::get('/cities/{governate}', 'getCitiesByGovernate');
    // Route::get('/jobDetails', 'create')->name('jobDetails');


});


Route::controller(PaymentController::class)->prefix('admin/payments')->name('admin.payments.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/paymentDetails', 'create')->name('paymentDetails');


});
Route::controller(ApplicationController::class)->prefix('admin/applications')->name('admin.applications.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/applicationDetails', 'create')->name('applicationDetails');


});
Route::controller(WebsiteReviewController::class)->prefix('admin/websiteReviews')->name('admin.websiteReviews.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/websiteReviewDetails', 'create')->name('websiteReviewDetails');


});
Route::controller(UserReviewController::class)->prefix('admin/usersReviews')->name('admin.usersReviews.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/ReviewDetails', 'create')->name('ReviewDetails');


});
Route::controller(ContactUsController::class)->prefix('admin/contactUs')->name('admin.contactUs.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/contactDetails', 'create')->name('contactDetails');


});


Route::middleware(['auth'])->group(function () {
    Route::get('/index', function(){
        return view('admin.index');
    })->name('admin.index');
});
Route::get('/admin/dashboard', function () {
    return view('admin/dashboard');
})->middleware(['auth', 'verified'])->name('admin/dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
