<?php

use App\Http\Controllers\HomeController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified',])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('dashboard');
    Route::get('/movie_table', [HomeController::class, 'movieTable'])->name('movieTable');
    Route::get('/florence', [HomeController::class, 'florence'])->name('thomas');

    
    Route::get('/courses', [HomeController::class, 'courses'])->name('formations');
    Route::get('/courses/{id}', [HomeController::class, 'course'])->name('formation');
    // renvoie sur /courses à cause de href
    // Route::get('/courses/create', [HomeController::class, 'courseCreate'])->name('course.create');
    // Create Course
    Route::get('/courses_create', [HomeController::class, 'courseCreate'])->name('course.create');
    // Store Course    
    Route::post('/courses_store', [HomeController::class, 'courseStore'])->name('course.store');  
    Route::put('/courses_edit/{course}', [HomeController::class, 'courseUpdate'])->name('course.update'); 
    Route::delete('/courses_delete/{course}', [HomeController::class, 'courseSupprimer'])->name('course.supprimer');
    Route::get ('/users', [HomeController::class, 'users'])->name('users');
    Route::get ('/users/{id}/edit', [HomeController::class, 'userEdit'])->name('userEdit');
    
    
    Route::get ('/eleves', [HomeController::class, 'eleves'])->name('eleves');
    Route::get ('/eleve/new', [HomeController::class, 'eleveNouveau'])->name('eleveNouveau');
    Route::post('/eleve/store', [HomeController::class, 'eleveStore'])->name('eleveStore');  
    Route::get('/eleve/{id}/edit', [HomeController::class, 'eleveEdit'])->name('eleveEdit');  
    Route::post('/eleve/{eleve}/update', [HomeController::class, 'eleveUpdate'])->name('eleveUpdate');  

});
