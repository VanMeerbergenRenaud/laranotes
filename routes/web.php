<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NotesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
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

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/users', [UserController::class, 'index']);

/*Route::get('/login', [ProfileController::class, 'edit']);
Route::get('/register', [AuthenticatedSessionController::class, 'create']);*/

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
        ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);
});

Route::middleware('auth')->group(function () {
    Route::resource('notes', NotesController::class); // Charge toutes les routes d'un controllers avec les 7 méthodes

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
});

Route::get('/job', function() {
    dispatch(function() {
       logger('hello');
    });
});
// Voir la liste des routes => php artisan route:list (méthode http, url)

// Commande de query depuis le terminal => php artisan tinker
// User::where('email', 'like', 'domi%') => QueryBuilder
// User::where('email', 'like', 'domi%')->get(); // Quand c'est une query on utilise get
// User::where('email', 'like', 'domi%')->get()->first(); // Créer le premier item d'une collection
// User::where('email', 'like', 'domi%')->first(); // Méthode de queryBuilder, retourne le premier tableau trouvé

