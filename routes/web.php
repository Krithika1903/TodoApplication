<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Insertcontroller;

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


Route::middleware('auth')->group(function(){
    Route::controller(Insertcontroller::class)->group(function () {
        Route::view('/add','add');
        Route::post('/add','addTodo'); 
        Route::get('display','fetchdata');
        Route::get('/delete/{id}','delete');
        Route::get('/edit/{id}','edit');
        route::post('update','update');
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');
    });
});



require __DIR__.'/auth.php';
