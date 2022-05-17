<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controller\ProdiController;

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

Route::get("/prodi/create", [ProdiController::class, "create"])->name("prodi.create");
Route::post("/prodi/store", [ProdiController::class, "store"])->name("prodi.store");