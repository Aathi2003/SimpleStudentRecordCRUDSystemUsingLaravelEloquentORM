<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\AddStudent;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('layout.Stu_Service_Views.add_student');
});
Route::get('/view', [AddStudent::class,'show']);

Route::get('/trash', [AddStudent::class,'remove']);

Route::get('/updateget', [AddStudent::class,'getdata']);

Route::middleware(['validate'])->group(function () {
    Route::post('/add', [AddStudent::class,'store']);
    Route::post('/update', [AddStudent::class,'update']);
});

Route::get('/view_profile', [AddStudent::class , 'view']);
