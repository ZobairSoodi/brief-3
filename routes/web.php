<?php

use App\Http\Controllers\ApprController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Models\Apprenant;

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

Route::get('/promotions', [ MainController::class, 'index' ])->name('index');

Route::get('/promotions/add', [ MainController::class, 'add_promotion' ])->name('add-promotion');

Route::post('/promotions/add', [ MainController:: class, 'insert_promotion' ])->name('insert-promotion');

Route::get('promotion/{id}/edit', [ MainController::class, 'edit_promotion' ])->name('edit-promotion');

Route::post('promotion/{id}/edit', [ MainController::class, 'update_promotion' ])->name('update-promotion');

Route::get('promotion/delete', [ MainController::class, 'delete_promotion' ])->name('delete-promotion');

Route::get('promotions/{id}/apprenants', [ MainController::class, 'show_appr_by_prom' ]);

Route::post('promotion/{id_prom}/apprenants/add', [ ApprController::class, 'add_appr' ])->name('add_appr');

Route::get('promotion/apprenants/{id_appr}/edit', [ ApprController::class, 'edit_appr' ])->name('edit_appr');

Route::post('promotion/apprenants/{id_appr}/edit', [ ApprController::class, 'update_appr' ])->name('update_appr');

Route::get('promotion/apprenants/{id_appr}/delete', [ ApprController::class, 'delete_appr' ])->name('delete_appr');

Route::get('search/{name}', [ MainController::class, 'search_prom'])->name('search');

Route::get('search/', [ MainController::class, 'search_prom'])->name('search');

Route::get('search_appr/{id}/promotion/{name}', [ ApprController::class, 'search_appr'])->name('search-appr');

Route::get('search_appr/{id}/promotion/', [ ApprController::class, 'search_appr'])->name('search-appr');