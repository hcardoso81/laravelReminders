<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return
        redirect()->to('login');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();


Route::resource('recordatorios', App\Http\Controllers\ReminderController::class)->names([
    'index' => 'reminders.index',
    'create' => 'reminders.create',
    'store' => 'reminders.store',
    'show' => 'reminders.show',
    'update' => 'reminders.update',
    'destroy' => 'reminders.destroy',
]);
