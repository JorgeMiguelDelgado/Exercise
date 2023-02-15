<?php

use App\Http\Controllers\CategorieController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('home', 'App\Http\Controllers\HomeController@index')->name('notes.filtered');

Route::resource('categories', CategorieController::class);
Route::resource('tags', TagController::class);


Route::resource('notes', NoteController::class);
Route::put('notes/{id}/estado', 'App\Http\Controllers\NoteController@estado');
Route::get('notesarch', [NoteController::class, 'archivadas'])->name('notes.archivadas');
//Route::get('filtros', 'App\Http\Controllers\NoteController@showNotesWithFilters')->name('notes.filtered');

