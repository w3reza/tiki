<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\Backend\busController;
use App\Http\Controllers\backend\SeatController;
use App\Http\Controllers\Backend\backendController;


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


//Routing Group without Middleware

/*
|--------------------------------------------------------------------------
| Admin Web Routes with admin prefix
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->group(function () {
    Route::get('/', [backendController::class, 'index'])->name('home');

/*
|--------------------------------------------------------------------------
| Bus Create Routes
|--------------------------------------------------------------------------
*/

Route::get('/buses', [busController::class, 'index'])->name('bus.index');
Route::get('bus/create', [busController::class, 'create'])->name('bus.create');
Route::post('bus/store', [busController::class, 'store'])->name('bus.store');


/*
|--------------------------------------------------------------------------
| Add Bus Seats Routes
|--------------------------------------------------------------------------
*/

Route::get('/seats/add/{id}', [SeatController::class, 'create'])->name('seats.create');
Route::post('/seats/add/{busId}', [SeatController::class, 'store'])->name('seats.store');
Route::get('/seats/{busId}', [SeatController::class, 'index'])->name('seats.index');





});



/*
|--------------------------------------------------------------------------
| End of Admin Web Routes with admin prefix
|--------------------------------------------------------------------------
*/

/*
|--------------------------------------------------------------------------
| Bus Search Routes
|--------------------------------------------------------------------------
*/

Route::get('/find_trip', [busController::class, 'find'])->name('find.trip');
Route::post('find_trip', [busController::class, 'find'])->name('bus.find.trip');
// Route::post('bus/store', [busController::class, 'store'])->name('bus.store');

Route::post('/book/{seat_id}', [BookingController::class, 'store'])->name('book.store');
