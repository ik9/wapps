<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\NetworkNote;
use App\Http\Controllers\NoteController;
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

Auth::routes();

// Home Controller
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);

Route::get('/defs', [App\Http\Controllers\HomeController::class, 'defs'])->name('defs');
Route::post('/update_defs', [App\Http\Controllers\HomeController::class, 'update_defs'])->name('update_defs');

// networks controller
Route::get('/networks', [App\Http\Controllers\NetworkController::class, 'networks'])->name('networks');
Route::get('/network/{feeder_id}', [App\Http\Controllers\NetworkController::class,'network'])->name('network');
Route::get('/equipment/{type_id}/{feeder_id}', [App\Http\Controllers\NetworkController::class,'equipment'])->name('equipment');
Route::get('/add_equipment/{type_id}/{feeder_id}', [App\Http\Controllers\NetworkController::class,'form_equipment'])->name('equipment.form');
Route::post('/add_equipment/{type_id}/{feeder_id}', [App\Http\Controllers\NetworkController::class,'add_equipment'])->name('equipment.post');
Route::get('/delete_equipment/{id}', [App\Http\Controllers\NetworkController::class,'delete_equipment'])->name('delete_equipment');

// Poll Controller
Route::get('/feeders', [App\Http\Controllers\PollController::class, 'feeders'])->name('feeders');
Route::get('/user_feeders', [App\Http\Controllers\PollController::class, 'user_feeders'])->name('user_feeders');
Route::get('/feeder', [App\Http\Controllers\PollController::class,'feeder'])->name('feeder');
Route::post('/add_feeder', [App\Http\Controllers\PollController::class,'add_feeder'])->name('add_feeder');
Route::get('/delete_feeder/{id}', [App\Http\Controllers\PollController::class,'delete_feeder'])->name('delete_feeder');

Route::get('/feeder/adapters/{feeder_id}', [App\Http\Controllers\PollController::class,'adapters'])->name('adapters');
Route::get('/adapter/{feeder_id}', [App\Http\Controllers\PollController::class,'adapter'])->name('adapter');
Route::post('/add_adapter/{feeder_id}', [App\Http\Controllers\PollController::class,'add_adapter'])->name('add_adapter');
Route::get('/delete_adapter/{id}', [App\Http\Controllers\PollController::class,'delete_adapter'])->name('delete_adapter');


Route::get('/feeder/adapter/counters/{feeder_id}/{adapter_id}', [App\Http\Controllers\PollController::class,'counters'])->name('counters');
Route::get('/counter/{feeder_id}/{adapter_id}', [App\Http\Controllers\PollController::class,'counter'])->name('counter');
Route::post('/add_counter/{feeder_id}/{adapter_id}', [App\Http\Controllers\PollController::class,'add_counter'])->name('add_counter');
Route::get('/delete_counter/{id}', [App\Http\Controllers\PollController::class,'delete_counter'])->name('delete_counter');

// NoteController
// Route::resource('notes', NoteController::class);
Route::post('notes/{type}/{id}', [NoteController::class, 'create'])->name('notes.create');
Route::get('notes/{type}/{id}',[NoteController::class, 'show'])->name('notes.show');
Route::get('notes/{id}', [NoteController::class, 'destroy'])->name('notes.destroy');
// NetworkNote
Route::post('/network_notes_create/{id}', [App\Http\Controllers\NetworkNote::class, 'create'])->name('network_notes_create');
Route::get('/network_notes_form/{id}',[App\Http\Controllers\NetworkNote::class, 'form'])->name('network_notes_form');
Route::get('/network_notes_show/{id}',[App\Http\Controllers\NetworkNote::class, 'show'])->name('network_notes_show');
Route::get('/network_notes_destroy/{id}', [App\Http\Controllers\NetworkNote::class, 'destroy'])->name('network_notes_destroy');


// CSV
Route::get('/export/{feeder_id}', [ExportController::class, 'export'])->name('export');
Route::get('/export_all', [ExportController::class, 'export_all'])->name('export_all');
Route::get('/export_feeders', [ExportController::class, 'export_feeders'])->name('export_feeders');
Route::get('/export_adapters', [ExportController::class, 'export_adapters'])->name('export_adapters');
Route::get('/export_counters', [ExportController::class, 'export_all'])->name('export_counters');

// AdminController
Route::get('/users', [AdminController::class, 'users'])->name('users');
Route::get('/delete_user/{user_id}', [AdminController::class, 'delete_user'])->name('user.delete');

Route::get('/log', [AdminController::class, 'log'])->name('log');