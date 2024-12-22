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
use App\Http\Controllers\CityController;
use Faker\Provider\ar_EG\Payment;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;


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


//login routes
Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');

Route::post('login', [AuthenticatedSessionController::class, 'store']);


//////////////////
Route::get('/cities', [CityController::class, 'getCities']);
// Route::get('/dashboard', function () {
//     return view('dashboard')->name('dashboard');
// });
Route::get('/', function () {
    return view('user.homePage.index');
});
Route::get('/home', function () {
    return view('user.homePage.index'); // Or return the appropriate view
})->name('home');
Route::get('/about', function () {
    return view('user.aboutus.about'); // Or return the appropriate view
})->name('about');
Route::get('/contact', function () {
    return view('user.contact.contact'); // Or return the appropriate view
})->name('contact');



//user jobs routes
Route::get('/postJob', function () {
    return view('user.jobs.postJob'); 
})->name('postJob');
Route::get('/jobs', function () {
    return view('user.jobs.jobs'); 
})->name('jobs');




Route::controller(UserController::class)->prefix('admin/users')->name('admin.users.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/addUser', 'create')->name('addUser');
    Route::post('/storeUser', 'store')->name('storeUser');
    Route::get('/userDetails/{id}', 'show')->name('userDetails');
    Route::get('/editUser/{id}', 'edit')->name('editUser');
    Route::patch('/editUser/{id}', 'update')->name('updateUser');
    Route::get('/adminProfile', 'adminProfile')->name('adminProfile');
    Route::get('/cities/{governate}',  'getCitiesByGovernate');
    Route::delete('/deleteUser/{id}', 'destroy')->name('destroy');
});

Route::controller(CategoryController::class)->prefix('admin/categories')->name('admin.categories.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/addCategory', 'create')->name('addCategory');
    Route::post('/storeCategory', 'store')->name('storeCategory');
    Route::get('/categoryDetails/{id}', 'show')->name('showCategory');
    Route::get('/editCategory/{id}', 'edit')->name('editCategory');
    Route::PATCH('/updateCategory/{id}', 'update')->name('updateCategory');
    Route::delete('/deleteCategory/{id}', 'destroy')->name('deleteCategory');
});

Route::controller(JobController::class)->prefix('admin/jobs')->name('admin.jobs.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/addJob', 'create')->name('addJob');
    Route::post('/storeJob', 'store')->name('storeJob');
    Route::get('/jobDetails/{id}', 'show')->name('jobDetails');
    Route::get('/cities/{governate}', 'getCitiesByGovernate');
    // Route::get('/jobDetails', 'create')->name('jobDetails');
    Route::get('/editJob/{id}', 'edit')->name('editJob');
    Route::PATCH('/updateJob/{id}', 'update')->name('updateJob');
    Route::delete('/deleteJob/{id}', 'destroy')->name('deleteJob');
});


Route::controller(PaymentController::class)
    ->prefix('admin/payments')
    ->name('admin.payments.')
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{payment}', 'show')->name('show');
        Route::get('/{payment}/edit', 'edit')->name('edit');
        Route::put('/{payment}', 'update')->name('update');
        Route::delete('/{payment}', 'destroy')->name('destroy');
    });

Route::controller(ApplicationController::class)
    ->prefix('admin/applications')
    ->name('admin.applications.')
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{application_id}', 'show')->name('show');
        Route::get('/{application_id}/edit', 'edit')->name('edit');
        Route::put('/{application_id}', 'update')->name('update');
        Route::delete('/{application_id}', 'destroy')->name('destroy');
    });


Route::controller(WebsiteReviewController::class)
    ->prefix('admin/websiteReviews')
    ->name('admin.websiteReviews.')
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{review}', 'show')->name('show');
        Route::get('/{review}/edit', 'edit')->name('edit');
        Route::put('/{review}', 'update')->name('update');
        Route::delete('/{review}', 'destroy')->name('destroy');
    });

Route::controller(UserReviewController::class)
    ->prefix('admin/usersReviews')->name('admin.usersReviews.')->group(function () {
        Route::get('/', 'index')->name('index');            
        Route::get('/create', 'create')->name('create');    
        Route::post('/', 'store')->name('store');           
        Route::get('/{id}', 'show')->name('show');          
        Route::get('/{id}/edit', 'edit')->name('edit');     
        Route::put('/{id}', 'update')->name('update');      
        Route::delete('/{id}', 'destroy')->name('destroy'); 
    });
Route::controller(ContactUsController::class)->prefix('admin/contactUs')->name('admin.contactUs.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/', 'store')->name('store');
    Route::get('/{id}', 'show')->name('show');
    Route::get('/{id}/edit', 'edit')->name('edit');
    Route::put('/{id}', 'update')->name('update');
    Route::delete('/{id}', 'destroy')->name('destroy');
});


Route::get('/profile', function () {
    return view('dashboard'); // Or return the appropriate view
})->name('profile');

Route::middleware(['auth'])->group(function () {
    Route::get('/index', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});
Route::get('/admin/dashboard', function () {
    return view('admin/index');
})->middleware(['auth', 'verified'])->name('admin/index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('editProfile');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
