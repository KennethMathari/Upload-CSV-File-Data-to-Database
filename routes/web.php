<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InventoryController;
use App\Models\Inventory;


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

Route::get('/', [InventoryController::class, 'index'])->name('index');
Route::get('/search', [InventoryController::class, 'search'])->name('search');
Route::post('/', [InventoryController::class, 'upload'])->name('upload');


Route::get('/test', function(){
    (new Inventory())->importToDB();
    dd('done');
});
