<?php

use App\Http\Controllers\ProcessorController;
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

Route::get('/phpinfo',function(){
	phpinfo();
});

Route::get('/{filename}',[ProcessorController::class,'run']);

/*
Route::get('/fd',[ProcessorController::class,'fd']);
Route::get('/firstdata',[ProcessorController::class,'fd']);
Route::get('/nuvei',[ProcessorController::class,'fd']);
*/
