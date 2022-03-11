<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Dashboard\HomeController;
use App\Http\Controllers\Dashboard\AdminUserController;
use App\Http\Controllers\Dashboard\BlogController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\ProjectController;
use App\Http\Controllers\FrontendController;


Route::get('/', [FrontendController::class, 'home']);
Route::get('/blogs', [FrontendController::class, 'blogs'])->name('blogs');


Route::get('/testPage', function(){
    return abort(403);
});

Route::get('/cv-download', function() {
    $filePath = public_path("resume\MyCv.pdf");
    $headers = ['Content-Type: application/pdf'];
    $fileName = time().'.pdf';
    return response()->download($filePath, $fileName, $headers);
})->name('cv-download');

Route::post('/send-email', [ContactController::class, 'sendEmail'])->name('send.email');


Route::get('/admin', [HomeController::class, 'home'])->name('admin');


Route::prefix('admin')->group(function () {

    /* Authentication Routes... */
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login']);
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');

    Route::resource('admin_users', AdminUserController::class);
    Route::resource('projects', ProjectController::class);

    Route::get('blogs/home', function(){
        return view('dashboard.blogs.home');
    })->name('blogs.home');

    Route::resource('categories', CategoryController::class);
    Route::resource('blogs', BlogController::class);


});

