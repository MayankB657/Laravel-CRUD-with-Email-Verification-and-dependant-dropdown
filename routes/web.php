<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{StudentController,CountryController,StateController,CityController,Controller,MailController};


Route::get('/', function () {
    return view('auth.register');
});

Route::get('/dashboard', function () {
    return redirect()->route('students.index');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::post('user-logout', [Controller::class, 'UserLogout'])->name('UserLogout');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::resource('students', StudentController::class);

Route::post('ajax/fetch-states', [StudentController::class, 'fetchState']);
Route::post('ajax/fetch-cities', [StudentController::class, 'fetchCity']);

Route::resource('country', CountryController::class);
Route::resource('state', StateController::class);
Route::resource('city', CityController::class);

Route::get('/sendattachmentemail', [MailController::class,'attachment_email']);
Route::get('/sendhtmlemail', [MailController::class,'html_email']);
Route::get('/sendbasicemail', [MailController::class,'basic_email']);