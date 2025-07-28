<?php

use App\Http\Controllers\DispositivoController;

use App\Http\Controllers\BiometricoController;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

// Route::get('/', function () {
//     return view('welcome');
// })->name('home');

//Route::redirect('/', '/biometrico');

Route::get('biometrico', [BiometricoController::class, 'index'])->name('biometrico.index');
Route::get('asistencia', [BiometricoController::class, 'index'])->name('asistencia.index');
Route::get('usuarios', [BiometricoController::class, 'usuarios'])->name('usuarios.index');
// Route::get('dispositivo', [BiometricoController::class, 'dispositivo'])->name('dispositivo.index');
//Route::resource('biometrico', BiometricoController::class)->only(['index']);

Route::match(['get', 'post'], 'dispositivos', [DispositivoController::class, 'index'])->name('dispositivos.index');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__ . '/auth.php';
