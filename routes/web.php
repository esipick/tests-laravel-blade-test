<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;

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
    return view('form_1');
});

Route::get('/form2', function()
{
   return View('form_2');
});
Route::get('/error', function()
{
   return View('error');
});
Route::post('form1',[FormController::class, 'form1']);
Route::post('form2',[FormController::class, 'form2']);
