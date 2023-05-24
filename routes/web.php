<?php

use App\Http\Controllers\Api\ContactController;
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

Route::get('/', [ContactController::class, 'listAllContacts'])->name('Contacts.index');
Route::get('/contacts/create', [ContactController::class, 'createViewContact'])->name('Contacts.create');
Route::post('/contacts/create', [ContactController::class, 'createContact'])->name('Contacts.create');
Route::get('/contacts/{id}/details', [ContactController::class, 'findByIdContact'])->name('Contacts.details');
Route::get('/contacts/{id}/editView', [ContactController::class, 'editView'])->name('Contacts.editView');
Route::put('/contacts/{id}/edit', [ContactController::class, 'editContact'])->name('Contacts.edit');
Route::delete('/contacts/{id}/delete', [ContactController::class, 'softDelete'])->name('Contacts.delete');