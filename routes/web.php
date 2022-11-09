<?php

use App\Http\Controllers\ApprController;
use App\Http\Controllers\BriefController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\TaskController;
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

Route::get('/', function () {
    return view('list');
});

Route::get('/promotions', [MainController::class, 'index'])->name('index');

Route::get('/promotions/add', [MainController::class, 'add_promotion'])->name('add-promotion');

Route::post('/promotions/add', [MainController::class, 'insert_promotion'])->name('insert-promotion');

Route::get('promotion/{id}/edit', [MainController::class, 'edit_promotion'])->name('edit-promotion');

Route::post('promotion/{id}/edit', [MainController::class, 'update_promotion'])->name('update-promotion');

Route::get('promotion/delete', [MainController::class, 'delete_promotion'])->name('delete-promotion');

Route::get('promotions/{id}/apprenants', [MainController::class, 'show_appr_by_prom']);

Route::post('promotion/{id_prom}/apprenants/add', [ApprController::class, 'add_appr'])->name('add_appr');

Route::get('promotion/apprenants/{id_appr}/edit', [ApprController::class, 'edit_appr'])->name('edit_appr');

Route::post('promotion/apprenants/{id_appr}/edit', [ApprController::class, 'update_appr'])->name('update_appr');

Route::get('promotion/apprenants/{id_appr}/delete', [ApprController::class, 'delete_appr'])->name('delete_appr');

Route::get('search/{name}', [MainController::class, 'search_prom'])->name('search');

Route::get('search/', [MainController::class, 'search_prom'])->name('search');

Route::get('search_appr/{id}/promotion/{name}', [ApprController::class, 'search_appr'])->name('search-appr');

Route::get('search_appr/{id}/promotion/', [ApprController::class, 'search_appr'])->name('search-appr');

Route::get('get_appr/{id}', [ApprController::class, 'get_appr'])->name('get-appr');

Route::get('briefs', [BriefController::class, 'show_briefs'])->name('briefs');

Route::post('briefs/add', [BriefController::class, 'add_brief'])->name('add-brief');

Route::post('briefs/{id_brief}/edit', [BriefController::class, 'edit_brief'])->name('edit-brief');

Route::get('briefs/{id_brief}/delete', [BriefController::class, 'delete_brief'])->name('delete-brief');

Route::get('briefs/{id_brief}/assign', [BriefController::class, 'show_assign_brief'])->name('show-assign-brief');

Route::post('briefs/{id_brief}/assign/{id_appr}', [BriefController::class, 'assign_brief'])->name('assign-brief');

// ------ Alternative function to assign_brief ------ //
// Route::post('briefs/{id_brief}/assign/{id_appr}/{arg}', [BriefController::class, 'assign_brief_alt'])->name('assign-brief-alt');

Route::get('briefs/{id_brief}/get', [BriefController::class, 'get_brief'])->name('get-brief');

Route::get('briefs/{id_brief}/tasks', [TaskController::class, 'show_tasks'])->name('show-tasks');

Route::get('tasks/{id_task}', [TaskController::class, 'get_tasks'])->name('get-tasks');

Route::post('briefs/{id_brief}/tasks/add', [TaskController::class, 'add_task'])->name('add-task');

Route::post('tasks/{id_task}/edit', [TaskController::class, 'edit_task'])->name('edit-task');

Route::get('tasks/{id_task}/delete', [TaskController::class, 'delete_task'])->name('delete-task');