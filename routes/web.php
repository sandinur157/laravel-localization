<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

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


Route::get('/checkout', [MainController::class, 'checkout']);
Route::get('/album', [MainController::class, 'album']);
Route::get('/switch/{locale}', [MainController::class, 'switch']);

Route::group([
    'prefix' => '{locale}',
    'where' => ['locale' => '[a-zA-Z]{2}']
], function () {
    Route::get('/checkout', [MainController::class, 'checkout']);
    Route::get('/album', [MainController::class, 'album']);
    Route::get('/switch/{locale}', [MainController::class, 'switch']);
});