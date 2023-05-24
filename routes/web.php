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
Route::get('/contacts/{id}/details', [ContactController::class, 'detailsViewContact'])->name('Contacts.details');