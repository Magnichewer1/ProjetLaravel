<?php

use App\Http\Controllers\ControleurMembres;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
return view('welcome');
});
Route::get('/dashboard', function () {
return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::middleware('auth')->group(function () {
Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::patch('/profile', [ProfileController::class,
'update'])->name('profile.update');
Route::delete('/profile', [ProfileController::class,
'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('membres', 'App\Http\Controllers\ControleurMembres@index')->name('membres');
Route::get('membre/{numero}', 'App\Http\Controllers\ControleurMembres@afficher')->name('membre');
Route::get('creer', 'App\Http\Controllers\ControleurMembres@creer')->name('creer');
Route::post('creation/membre', 'App\Http\Controllers\ControleurMembres@enregistrer')->name('creation');
Route::get('modifier/{id}', 'App\Http\Controllers\ControleurMembres@editer')->middleware('auth')->name('modifier');
Route::patch('miseAJour/{id}', 'App\Http\Controllers\ControleurMembres@miseAJour')
    ->middleware('auth')
    ->name('miseAJour');


Route::get('/identite','App\Http\Controllers\ControleurMembres@identite');
Route::get('/protege','App\Http\Controllers\ControleurMembres@acces_protege')
->middleware('auth');

Route::get('/admin/users', 'App\Http\Controllers\AdminController@showUsersEnAttente')->name('admin.users');
Route::post('/admin/users/{id}/approve', 'App\Http\Controllers\AdminController@approveUser')->name('admin.users.approve');



